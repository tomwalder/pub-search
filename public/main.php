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
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>App Engine Search API PHP Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/search.css">
</head>
<body>

<div class="container" id="main">

    <div class="row">
        <div class="col-md-12">
            <h1><img src="/img/google-app-engine-logo.png" id="gae-logo" /> App Engine Search <span class="hidden-xs">API with</span> PHP</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <h2>What's this then?</h2>
            <p>A super simple web app using the <a href="https://github.com/tomwalder/php-appengine-search">php-appengine-search</a> library to access Google App Engine Search API directly from PHP.</p>
        </div>
        <div class="col-md-4">
            <h2>Resources</h2>
            <p><a href="https://github.com/tomwalder/php-appengine-search" target="_blank"><span aria-hidden="true" class="glyphicon glyphicon-new-window"></span> <span class="hidden-xs">The</span> php-appengine-search library on GitHub</a></p>
            <p><a href="https://github.com/tomwalder/pub-search" target="_blank"><span aria-hidden="true" class="glyphicon glyphicon-new-window"></span> Demo application (this web site)</a></p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2>Pub Search</h2>
            <p>Much better than a guest book!</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="well">
                <div class="input-group">
                    <form>
                        <input type="text" class="form-control" id="q" name="q" placeholder="Get typing..." autocomplete="off">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button" id="go">Go</button>
                        </span>
                    </form>
                </div>
            </div>
            <p><em>Auto-complete results <span id="ac_hint"></span></em></p>
            <div class="list-group" id="ac_results"></div>
        </div>
        <div class="col-md-8">
            <p><em><span id="fr_hint">Full search results</span></em></p>
            <div class="list-group" id="full_results"></div>
        </div>
    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="/js/search.js"></script>
</body>
</html>

