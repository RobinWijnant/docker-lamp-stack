;
$(document).ready(() => {
    
'use strict'

// Get hosts from hosts.json
$.ajax({ 
    type: 'GET', 
    url: '/hosts.json',
    success: (data) => { 
        showHosts(data);
        AreHostsAvailable();
    },
    error: () => showNoHostsFound()
});

// Show Not found in the DOM
let showNoHostsFound = () => {
    $('.js-no-hosts').removeClass('hidden');
};

// Show the hosts in the DOM
let showHosts = (hosts) => {
    // Get Host Example
    let $hostExample = $('.js-host-example');
    var $hostClone = $hostExample.clone(true).removeClass('js-host-example hidden');
    $hostExample.remove();
    
    // Change the name and url and append to the host list
    for (let i in hosts) {
        let $hostCloned = $hostClone.clone(true).attr('id', i);
        $hostCloned.find('.js-href').attr('href', hosts[i].url);
        $hostCloned.find('.js-url').text(hosts[i].url);
        $hostCloned.find('.js-name').text(hosts[i].name);
        $hostCloned.appendTo('.js-hosts');
    }
};

// Check if the hostnames return a response
let AreHostsAvailable = () => {
    $('.js-hosts > li .js-url').each(function() {
        let url = $(this).text();
        $.ajax({ 
            type: 'GET', 
            url: url,
            success: () => $(this).addClass('available'),
            error: () => $(this).addClass('unavailable')
        });
    });
};

// Load readme.md
$.ajax({ 
    type: 'GET', 
    url: '/readme.md',
    success: (md) => generateHTMLFromMarkdown(md),
    error: () => showNoReadmeFound()
});

// Show No readme found in the DOM
let showNoReadmeFound = () => {
    $('.no_readme_found').removeClass('hidden');
};

// Get HTML from markdown through github API
let generateHTMLFromMarkdown = (md) => {

    let jsonPost = {
        "text": md,
        "mode": "gfm",
        "context": "github/gollum"
    };

    $.ajax({
        type: 'POST', 
        url: 'http://api.github.com/markdown',
        data: JSON.stringify(jsonPost),
        success: (html) => {
            $('.js-readme').append(html).find('h1:first').remove();
        }
    });
}

});