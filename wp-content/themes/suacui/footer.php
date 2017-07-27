<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Título</h4>
            </div>
            <div class="modal-body" id="myModalText">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary btn-lg hidden" id="btn-modal" data-toggle="modal" data-target="#myModal"></button>

<!--DEIXAR ROLAGEM SUAVEE-->
<script type="text/javascript">// <![CDATA[
    $(document).ready(function() {
        function filterPath(string) {
            return string
                .replace(/^\//,'')
                .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
                .replace(/\/$/,'');
        }
        $('a[href*=#]').each(function() {
            if ( filterPath(location.pathname) == filterPath(this.pathname)
                && location.hostname == this.hostname
                && this.hash.replace(/#/,'') ) {
                var $targetId = $(this.hash), $targetAnchor = $('[name=' + this.hash.slice(1) +']');
                var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;
                if ($target) {
                    var targetOffset = $target.offset().top;
                    $(this).click(function() {
                        $('html, body').animate({scrollTop: targetOffset-85}, 700);
                        return false;
                    });
                }
            }
        });
    });
    // ]]></script>
<!--FIM ROLAGEM SUAVE-->

<!--scroll menu-->
<script>
    $(window).scroll(function(event){
        if ($(window).scrollTop() < 50){
            $("#cabecalho").css("background", "none");
        } else {
            $("#cabecalho").css("background", "rgba(1, 1, 1, 0.6)");
        }
    });
</script>

<script type="text/javascript">
 //funcao para navegacao de rolagem na pagina
jQuery(document).ready(function($) { 
    $(".scroll").click(function(event){        
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top-118}, 800);
   });
});
//funcao para fechar e abrir menu javascript
  $('.menu-anchor').on('click touchstart', function(e){
         $('html').toggleClass('menu-active');
         e.preventDefault();
         });
		 
		 
//funcao para fechar e abrir ver-todos os servicos
	$('.btn-box3').on('click touchstart', function(e){
         $('html').toggleClass('servicos-active');
         e.preventDefault();
         });

</script>
<script src="wp-content/themes/Euphoria/js/scrollReveal.js"></script>

<script type="text/javascript">
      (function($) {

        'use strict';

        window.sr= new scrollReveal({
          reset: true,
          move: '50px',
          mobile: true
        });

      })();
</script>

<?php wp_footer(); ?>

</body>
</html>