
<!-- Core Vendors JS -->
<script src="<?php echo base_url(); ?>seller_assets/js/vendors.min.js"></script>

<script src="<?php echo base_url(); ?>seller_assets/js/custom.js"></script>

<!-- page js -->
<script src="<?php echo base_url(); ?>seller_assets/vendors/chartjs/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/js/pages/dashboard-default.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/js/pages/datatables.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/js/pages/e-commerce-order-list.js"></script>

<!-- Core JS -->
<script src="<?php echo base_url(); ?>seller_assets/js/app.min.js"></script>

<!-- page js -->
<script src="<?php echo base_url(); ?>seller_assets/vendors/select2/select2.min.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/vendors/quill/quill.min.js"></script>
<script src="<?php echo base_url(); ?>seller_assets/js/pages/form-elements.js"></script>

<!--validation start-->
<script type="text/javascript">
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
    $("input[check_control]").keypress(function (e) {
        if ($(this).attr("check_control") == "alpha") 
        {
            var regex = new RegExp("^[a-zA-Z -]+$");
        } 
        else if ($(this).attr("check_control") == "number") 
        {
            var regex = new RegExp("^[0-9]+$");
        } 
        else if ($(this).attr("check_control") == "pwd") 
        {
            var regex = new RegExp("^[0-9a-zA-Z!@#$%^&*.]+$");
        }
        else 
        {
            var regex = new RegExp("^[a-zA-Z0-9.@_]+$");
        }
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            $(this).removeClass("form_error").addClass("form_valid");
            return true;
        } else {
            $(this).removeClass("form_valid").addClass("form_error");
        }
        e.preventDefault();
        return false;
    });
    $("input[check_control]").blur(function () {
        var val = this.value;
        if (val == "") {
            $(this).removeClass("form_valid").addClass("form_error");
        } else {
            $(this).removeClass("form_error").addClass("form_valid");
        }
    });
    
    setTimeout(function () {
        $(".my_alert_success").fadeOut("slow");
    }, 4000);
    setTimeout(function () {
        $(".my_alert").fadeOut("slow");
    }, 3000);

</script>

<!--validation end-->

<!-- EYE CHANGE EVENTS START  -->
<script>
    $c = 1;

    function showpass(id, cls)
    {
        if ($c == 1)
        {
            $(id).attr("type", "text");
            $(cls).css("color", "red");
            $(cls).removeClass("fa-eye");
            $(cls).addClass("fa-eye-slash");
            $c = 0;
        } else
        {
            $(id).attr("type", "password");
            $(cls).css("color", "#000");
            $(cls).removeClass("fa-eye-slash");
            $(cls).addClass("fa-eye");
            $c = 1;
        }

    }
</script>

<!-- EYE CHANGE EVENTS END  -->
