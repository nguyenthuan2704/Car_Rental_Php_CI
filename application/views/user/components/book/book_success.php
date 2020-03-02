<script type="text/javascript">
    setTimeout(function(){
      window.location = "<?php echo base_url("index.html"); ?>";
    }, 4000);
</script>
<style type="text/css" media="screen">
@import url(https://fonts.googleapis.com/css?family=EB+Garamond|Cardo:400italic);


body {
    margin: 0;
    background-color: #5774b8;

}


.sandbox-correct-pronounciation {
  padding: 10em 0 10em 0;
}

.heading-correct-pronounciation {

  margin: auto;
  text-align: center;
  position: relative;
}


h1 {
  color: #fff;
  font-family: 'Cardo', serif;
  font-size: 1.5em;
  font-weight: normal;
  font-style: italic;
  letter-spacing: 0.1em;
  line-height: 2.2em;
}

em {
  font-family: 'EB Garamond', serif;
  font-size: 3.5em;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  display: block;
  font-style:normal;
  padding-top: 0.1em;
  text-shadow: 0.07em 0.07em 0 rgba(0, 0, 0, 0.1);
  
  &::before, &::after {
  content: "§";
  display: inline-block;
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  transform: rotate(90deg);
	opacity: 0.2;
  margin: 0 0.6em;
  font-size: 0.5em;
}

}


.bottom {
  font-size: 1.5em;
  letter-spacing: 0.07em;
  font-size: 1em;
  display: block;
}
</style>
<div class="sandbox sandbox-correct-pronounciation">
  <h1 class="heading heading-correct-pronounciation">

    <em>Book Succes!</em>
    <br><br>
    Chúng tôi xác nhận và phản hồi lại cho bạn.
    <br>
   Vui lòng đợi...trang sẽ tự động chuyển
  </h1>
</div>
