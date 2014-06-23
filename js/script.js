/**Auto height .content for left vertical background image**/
(function( $ ){
	$(document).ready(function() {
		$(".content").height(function(i,val){
			return Math.ceil(val/74)*74;
		});
		var h = $(".content").height();
		$(".main-content").height( h );
	});
})( jQuery );