<?php
$file_name="Thumbnail ".time().".jpg";
if(isset($_POST['download'])){
 $imgUrl=$_POST["imgurl"];
 $ch=curl_init($imgUrl);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
$download=curl_exec($ch);
curl_close($ch);
header("content-type: image/jpg");
header("content-disposition:attachment; filename=${file_name}");
echo $download;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Download YouTube Video Thumbnail</title>
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
      <header>Download Thumbnail</header>
      <div class="url-input">
        <span class="title">Paste video url:</span>
        <div class="field">
          <input
            type="text"
            placeholder="https://www.youtube.com/watch?"
            required
          />
          <input type="hidden" class="hidden-input"  name="imgurl"/>
          <div class="bottom-line"></div>
        </div>
      </div>
      <div class="preview-area">
        <img src="" alt="thumbnail" class="thumbnail" />
        <i class="fas fa-cloud-download-alt icon"></i>
        <span>Paste video url to see preview</span>
      </div>
      <button class="download-btn " name="download" type="submit">Download Thumbnail</button>
    </form>
  </body>
</html>
