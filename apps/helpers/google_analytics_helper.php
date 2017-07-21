<?php

function google_analytics($google_account_id){
    
    $google_analytics_code = "
        <noscript><iframe src=\"//www.googletagmanager.com/ns.html?id=GTM-KH6JMX\" height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-KH6JMX');</script>";
    
    $google_analytics_code .= "
            <script> 
                var _gaq = _gaq || [];
                var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
                _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
                _gaq.push(['_setAccount', '" . $google_account_id . "']);
                _gaq.push(['_setDomainName', 'sindonews.com']);
                _gaq.push(['_addIgnoredRef', 'sindonews.com']);
                _gaq.push(['_setAllowLinker', true]);
                _gaq.push(['_trackPageview']);
                setTimeout(\"_gaq.push(['_trackEvent', 'ABR Classic', 'Timeout 15 Seconds Classic', 'ABR 15 Seconds Classic'])\",15000);

                (function() {
                  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();
            </script>";
    
    return $google_analytics_code;
}

function google_analytics_v3($google_account_id){  
    
    $google_analytics_code = "
        <noscript><iframe src=\"//www.googletagmanager.com/ns.html?id=GTM-KH6JMX\" height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-KH6JMX');</script>";

    return $google_analytics_code;
}

function google_analytics_v2($google_account_id){  
    
    $google_analytics_code = "
        <noscript><iframe src=\"//www.googletagmanager.com/ns.html?id=GTM-KH6JMX\" height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-KH6JMX');</script>";
    
    $google_analytics_code .= "
        <script>
            _atrk_opts={atrk_acct:\"p03zj1aEsk00MA\",domain:\"sindonews.com\",dynamic:true};
            (function(){
                var as=document.createElement('script');
                as.type='text/javascript';
                as.async=true;
                as.src='https://d31qbv1cthcecs.cloudfront.net/atrk.js';
                var s=document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(as,s);
            })();
        </script>
        <noscript><img src=\"https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=p03zj1aEsk00MA\" style=\"display:none\" height=\"1\" width=\"1\" alt=\"alexa\"></noscript>
        <script>
            (function() {
                var em = document.createElement('script'); em.type = 'text/javascript'; em.async = true;
		em.src = ('https:' == document.location.protocol ? 'https://id-ssl' : 'http://id-cdn') + '.effectivemeasure.net/em.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(em, s);
            })();
        </script>
        <noscript><img src=\"https://id.effectivemeasure.net/em_image\" alt=\"effectivemeasure\" style=\"position:absolute; left:-5px;\"></noscript>";

    return $google_analytics_code;
}

function old_google_analytics($google_account_id){
    
    $google_analytics_code = "
            <script> 
                var _gaq = _gaq || [];
                var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
                _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
                _gaq.push(['_setAccount', '" . $google_account_id . "']);
                _gaq.push(['_setDomainName', 'sindonews.com']);
                _gaq.push(['_addIgnoredRef', 'sindonews.com']);
                _gaq.push(['_setAllowLinker', true]);
                _gaq.push(['_trackPageview']);

                (function() {
                  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();
            </script>
            
            <script async src='//www.google-analytics.com/analytics.js'></script>
            <script>
                window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
                ga('create', '" . $google_account_id . "', 'auto', {'allowLinker': true});ga('require', 'linker');ga('linker:autoLink', ['koran-sindo.com']);ga('require', 'displayfeatures');ga('require', 'linkid');ga('send', 'pageview');                
            </script>
            
            <script>
                _atrk_opts={atrk_acct:\"p03zj1aEsk00MA\",domain:\"sindonews.com\",dynamic:true};
                (function(){
                    var as=document.createElement('script');
                    as.type='text/javascript';
                    as.async=true;
                    as.src='https://d31qbv1cthcecs.cloudfront.net/atrk.js';
                    var s=document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(as,s);
                })();
            </script>
            <noscript><img src=\"https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=p03zj1aEsk00MA\" style=\"display:none\" height=\"1\" width=\"1\" alt=\"alexa\"></noscript>";

    
    $google_analytics_code = "
            <script> 
                var _gaq = _gaq || [];
                var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
                _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
                _gaq.push(['_setAccount', '" . $google_account_id . "']);
                _gaq.push(['_setDomainName', 'sindonews.com']);
                _gaq.push(['_addIgnoredRef', 'sindonews.com']);
                _gaq.push(['_setAllowLinker', true]);
                _gaq.push(['_trackPageview']);
                setTimeout(\"_gaq.push(['_trackEvent', 'Adjusted Bounce Rate', '30 seconds'])\",15000);

                (function() {
                  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                })();
            </script>";
    
    $google_analytics_code = "
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-MT54Q9');</script>
        <noscript><iframe src=\"//www.googletagmanager.com/ns.html?id=GTM-MT54Q9\" height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>";
    
    $google_analytics_code .= "
        <script>
            _atrk_opts={atrk_acct:\"p03zj1aEsk00MA\",domain:\"sindonews.com\",dynamic:true};
            (function(){
                var as=document.createElement('script');
                as.type='text/javascript';
                as.async=true;
                as.src='https://d31qbv1cthcecs.cloudfront.net/atrk.js';
                var s=document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(as,s);
            })();
        </script>
        <noscript><img src=\"https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=p03zj1aEsk00MA\" style=\"display:none\" height=\"1\" width=\"1\" alt=\"alexa\"></noscript>
        <script>
            (function() {
                var em = document.createElement('script'); em.type = 'text/javascript'; em.async = true;
		em.src = ('https:' == document.location.protocol ? 'https://id-ssl' : 'http://id-cdn') + '.effectivemeasure.net/em.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(em, s);
            })();
        </script>
        <noscript><img src=\"https://id.effectivemeasure.net/em_image\" alt=\"effectivemeasure\" style=\"position:absolute; left:-5px;\"></noscript>";

    return $google_analytics_code;
}