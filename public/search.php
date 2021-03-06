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
$obj_index = new \Search\Index('pubs');

$str_query = '';
if(isset($_GET['q'])) {
    $str_query = $_GET['q'];
} elseif (isset($_POST['q'])) {
    $str_query = $_POST['q'];
}

$obj_response = $obj_index->search((new \Search\Query($str_query))->limit(200));

$arr_docs = [];
foreach($obj_response->results as $obj_result) {
    $arr_docs[] = [
        'name' => htmlspecialchars($obj_result->doc->name),
        'area' => htmlspecialchars($obj_result->doc->area),
        'address' => htmlspecialchars($obj_result->doc->address),
        // '_source' => $obj_result->doc->getData()
    ];
}

header('Content-Type: application/json');
echo json_encode($arr_docs);