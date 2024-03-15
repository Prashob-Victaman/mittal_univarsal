			$(document).ready(function(){
				$('.more').live('click',function(){
					var href = $(this).attr('href');
					if ($('#ajax').is(':visible')) {
						$('#ajax').css('display','block').animate({height:'1px'}).empty();
					}
					$('#ajax').css('display','block').animate({height:'200px'},function(){
						$('#ajax').html('<div id="loader"><img src="loader.gif" width="24" height="24" alt=""></div>');
						$('#ajax').load('contact.html #'+href,function(){
							$('#ajax').hide().fadeIn().highlightFade({color:'rgb(253,253,175)'});
						});
					});
					return true;
				});
			});
