
<!-- Place all Scripts Here -->
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<!-- Popper -->
<script src="<?php echo base_url(); ?>assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/typeit.min.js"></script>
<!-- Range Slider -->
<script src="<?php echo base_url(); ?>assets/js/ion.rangeSlider.min.js"></script>
<!-- Swiper Slider -->
<script src="<?php echo base_url(); ?>assets/js/swiper.min.js"></script>
<!-- Nice Select -->
<script src="<?php echo base_url(); ?>assets/js/jquery.nice-select.min.js"></script>
<!-- magnific popup -->
<script src="<?php echo base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
<!-- Maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script>
<!-- sticky sidebar -->
<script src="<?php echo base_url(); ?>assets/js/sticksy.js"></script>
<!-- Munch Box Js -->
<script src="<?php echo base_url(); ?>assets/js/munchbox.js"></script>
<!-- /Place all Scripts Here -->
<!--fontawesome-->
<script src="<?php echo base_url(); ?>assets/fontawesome-free-5.11.2-web/css/all.min.css"/></script>

<script src="<?php echo base_url(); ?>assets/js/texttospeech.js" type="text/javascript"></script>

<!--js-->
<script>
    $base_url = "http://localhost/MUNCHBOX/";
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#user_img_profile').attr('src', e.target.result);
                
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    setTimeout(function () {
        $(".add-alert-message").fadeOut("slow");
    }, 3000);
    setTimeout(function () {
        $(".add-success-message").fadeOut("slow");
    }, 3000);
    
    (function (w, d) {


                function LetterAvatar(name, size) {

                    name = name || '';
                    size = size || 60;

                    var colours = [
                        "#FF0000", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50",
                        "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                    ],
                            nameSplit = String(name).toUpperCase().split(' '),
                            initials, charIndex, colourIndex, canvas, context, dataURI;


                    if (nameSplit.length == 1) {
                        initials = nameSplit[0] ? nameSplit[0].charAt(0) : '?';
                    } else {
                        initials = nameSplit[0].charAt(0) + nameSplit[1].charAt(0);
                    }

                    if (w.devicePixelRatio) {
                        size = (size * w.devicePixelRatio);
                    }

                    charIndex = (initials == '?' ? 72 : initials.charCodeAt(0)) - 64;
                    colourIndex = charIndex % 20;
                    canvas = d.createElement('canvas');
                    canvas.width = size;
                    canvas.height = size;
                    context = canvas.getContext("2d");

                    context.fillStyle = "#FF0000";
                    context.fillRect(0, 0, canvas.width, canvas.height);
                    context.font = Math.round(canvas.width / 2) + "px Arial";
                    context.textAlign = "center";
                    context.fillStyle = "#FFF";
                    context.fillText(initials, size / 2, size / 1.5);

                    dataURI = canvas.toDataURL();
                    canvas = null;

                    return dataURI;
                }

                LetterAvatar.transform = function () {

                    Array.prototype.forEach.call(d.querySelectorAll('img[avatar]'), function (img, name) {
                        name = img.getAttribute('avatar');
                        img.src = LetterAvatar(name, img.getAttribute('width'));
                        img.removeAttribute('avatar');
                        img.setAttribute('alt', name);
                    });
                };


                // AMD support
                if (typeof define === 'function' && define.amd) {

                    define(function () {
                        return LetterAvatar;
                    });

                    // CommonJS and Node.js module support.
                } else if (typeof exports !== 'undefined') {

                    // Support Node.js specific `module.exports` (which can be a function)
                    if (typeof module != 'undefined' && module.exports) {
                        exports = module.exports = LetterAvatar;
                    }

                    // But always support CommonJS module 1.1.1 spec (`exports` cannot be a function)
                    exports.LetterAvatar = LetterAvatar;

                } else {

                    window.LetterAvatar = LetterAvatar;

                    d.addEventListener('DOMContentLoaded', function (event) {
                        LetterAvatar.transform();
                    });
                }

            })(window, document);
</script>


