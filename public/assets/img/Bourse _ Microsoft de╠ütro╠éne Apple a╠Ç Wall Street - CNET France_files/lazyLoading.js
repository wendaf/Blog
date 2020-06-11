;(function($) {
    
    $.fn.cbsiLazyLoading = function(options) {

        /* Default Options
        ================================================== */       
        var defaults = {

        };
        var options = $.extend(defaults, options);
        
        return this.each(function() {
            
            /* Variables
            ================================================== */        
            var $this = $(this);
            
            /* MediaQueries
            ================================================== */
            if ($this.attr('data-mq')) {
                if (Modernizr && Modernizr.mq($this.attr('data-mq'))) {
                    if ($this[0].nodeName.toLowerCase() == 'iframe') {
                        $this.load(function() {
                            var height = $this.contents().find('body').innerHeight();
                            var width;
                            
                            if (height == 34) {
                                width = 215;
                            } else if (height == 50) {
                                width = 300;
                            } else if (height == 90) {
                                width = 728;
                            } else if (height == 250) {
                                width = 300;
                            } else if (height == 600) {
                                width = 300;
                            }
                            
                            if ($this.hasClass('ad') && width) {
                                $this.css({
                                    height: height,
                                    width: width,
                                    position: 'relative',
                                    left: 'auto'
                                });
                            }
														
                        });
						if ($this.attr('data-ad-type') == 'banner' || $this.attr('data-ad-type') == 'leaderboard') {
							$this.wrap('<div class="banner"><div class="container"></div></div>');
						}
                        $this.attr('src', $this.attr('data-src'));
                    } else {
                        $.get($this.attr('data-src'), function(data) {
                            $this.append(data);
                            $this.trigger('hasLoaded');
                        });
                    }
                } 
            } else if (Modernizr && $this.attr('data-src') && $this[0].nodeName.toLowerCase() == 'img') {
                var imgSrc;
                if ($this.attr('data-src-768') && Modernizr.mq('screen and (min-width:768px)')) {
                    imgSrc = $this.attr('data-src-768');
					if ($this.siblings('.video').hasClass('small')) {
						$this.siblings('.video').removeClass('small');
					}
                } else {
                    imgSrc = $this.attr('data-src');
                }
                $this.attr('src', imgSrc);
            }
        });
    }
    
})(jQuery);