var search = {};

// do selectors
search.init = function(){
    search.frh = $('#fr_hint');
    search.q = $('#q');
    search.g = $('#go');
    search.r = $('#ac_results');
    search.ach = $('#ac_hint');
    search.fr = $('#full_results');
    search.xhr = null;
    search.q.keyup(function(evt){
        search.ac(search.q.val());
    });
    search.g.click(function(){
        console && console.log('a');
        search.go(search.q.val());
    });

    // if we have q param
    var q = getURLParameter('q');
    if(q && q.length > 0) {
        search.go(q);
    }
};

search.ac = function(q){
    if(search.xhr) {
        search.xhr.abort();
    }
    search.xhr = $.post( "/ac", {
        "q": q
    }, function(response) {
        search.r.empty();
        search.ach.text('(' + response.length + ')');
        for (pub in response) {
            search.r.append('<a class="list-group-item" href="#">' + response[pub].name + '</a>');
        }
    });
};

search.go = function(q){
    if(search.xhr) {
        search.xhr.abort();
    }
    search.xhr = $.post( "/search", {
        "q": q
    }, function(response) {
        search.r.empty();
        search.fr.empty();
        var result_label = ' results';
        if(1 == response.length) {
            result_label = ' result';
        }
        search.frh.text(response.length + result_label + ' for "' + q + '"');
        for (pub in response) {
            search.fr.append('<a class="list-group-item" href="#"><strong>' + response[pub].name + '</strong>, ' + response[pub].area + ' - ' + response[pub].address + '</a>');
        }
    });
};


search.init();

// http://stackoverflow.com/questions/11582512/how-to-get-url-parameters-with-javascript
function getURLParameter(name) {
    return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
}