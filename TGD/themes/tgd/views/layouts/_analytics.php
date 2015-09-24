<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
  _paq.push(["setCookieDomain", "<?php echo Yii::app()->params['piwikCookieDomain']; ?>"]);
  _paq.push(["setDomains", <?php echo CJavaScript::encode(Tools::explodeTrim(",", Yii::app()->params['piwikDomains'])); ?>]);
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="<?php echo Yii::app()->params['piwikURL']; ?>";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="<?php echo Yii::app()->params['piwikURL']; ?>piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!--  End Piwik Code -->