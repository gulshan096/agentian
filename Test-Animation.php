<!DOCTYPE html>
<html>
<head>
<style> 
.animated {
			display:none;
            background-repeat: no-repeat;
            background-position: left top;
            padding-top:0px;
            margin-bottom:60px;
            -webkit-animation-duration: 10s;
            animation-duration: 10s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
         }
     div {
        width: 600px;
        height: 600px;
        left:400px;
        position: relative;
        animation: myfirst 2s 0.5;
        animation-direction: reverse;
}

@keyframes myfirst {
  25%  {background-color: white; left: 400px; top: 0px;}
  50%  {background-color: white; left: 0px; top: 0px;}
  75%  {background-color: white; left: 0px; top: 0px;} 
}
</style>
</head>
<body>
  <div id = "animated-example" class = "animated fadeInRight">
      <img src="img_tree.gif"/>
  </div>
  <script>
    const myTimeout = setTimeout(transition, 2000);
    function transition() {
      document.getElementById("animated-example").style.display = "block";
    }  
  </script>
</body>
</html>






