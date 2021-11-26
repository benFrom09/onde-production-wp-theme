(function(){
    document.addEventListener("DOMContentLoaded", () => {
        console.log('hello from ajax');
        console.log(ajaxurl);
        (async () => {
            const response = await fetch(ajaxurl.ajax_url,
            { 
                method:"post",
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: "action=onde_load_posts"
            }
            );
            const json = response.json().then(result => console.log(result) );
            
        })();
    });
  
})();