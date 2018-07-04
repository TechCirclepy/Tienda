<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <!--<script type="text/javascript" src="https://connect.facebook.net/en_US/all.js"></script>-->
  <script type="text/javascript" src="https://connect.facebook.net/en_US/all.js#xfbml=1&appId=191112558403104" id="facebook-jssdk"></script>
</head>
<body>
  <div class="page-header">
  <h1>Share Dialog</h1>
</div>
<p>Click the button below to trigger a Share Dialog</p>

<div id="shareBtn" class="btn btn-success clearfix">Share</div>

<p style="margin-top: 50px">
  <hr />
  <a class="btn btn-small"  href="https://developers.facebook.com/docs/sharing/reference/share-dialog">Share Dialog Documentation</a>
</p>

<script>
document.getElementById('shareBtn').onclick = function() {
  FB.ui({
    method: 'share',
    display: 'popup',
    href: 'https://developers.facebook.com/docs/',
  }, function(response){});
}
</script>
</body>
</html>