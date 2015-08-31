<?php
/**
 * Copyright 2015 Tom Walder
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

require_once('../vendor/autoload.php');

$obj_schema = new Demo\PubSchema();
$obj_index = new \Search\Index('pubs');

// Clear out old data
$obj_response = $obj_index->search((new \Search\Query())->limit(2000));
$arr_ids = [];
foreach($obj_response->results as $obj_result) {
    $arr_ids[] = $obj_result->doc->getId();
}
echo "Deleting " . count($arr_ids) . "<br />";
$obj_index->delete($arr_ids);



// Load and process file
$arr_pubs = json_decode(file_get_contents('../resources/pubs.json'));
$arr_pub_docs = [];
$obj_tkzr = new \Search\Tokenizer();
foreach($arr_pubs as $arr_pub) {

    // Prepare doc
    $arr_pub_docs[] = $obj_schema->createDocument([
        'name' => $arr_pub[0],
        'name_ngram' => $obj_tkzr->edgeNGram($arr_pub[0]),
        'area' => $arr_pub[1],
        'address' => $arr_pub[2]
    ]);

    // Insert batch
    if(count($arr_pub_docs) >= 100) {
        echo "Inserting batch of " . count($arr_pub_docs) . "<br/>";
        $obj_index->put($arr_pub_docs);
        $arr_pub_docs = [];
    }
}

// Insert last batch
if(count($arr_pub_docs) >= 1) {
    echo "Inserting batch of " . count($arr_pub_docs) . "<br/>";
    $obj_index->put($arr_pub_docs);
    $arr_pub_docs = [];
}

