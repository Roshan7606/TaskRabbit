<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Booking Waiting</title>
    <?php $this->load->view("CSS"); ?>
</head>
<body>

<div class="header">
    <?php $this->load->view("header"); ?>
</div>

<div class="main-sec"></div>

<section style="padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card" style="padding: 30px; text-align: center;">
                    <h2 style="color:#ff3b3f;">Waiting for Provider Response</h2>
                    <p>Your booking request has been sent successfully.</p>

                    <h3 id="timer_text" style="margin-top: 20px; color:#ff3b3f;">02:00</h3>
                    <p id="status_text">Status: Pending</p>

                    <div id="provider_box" style="display:none; margin-top:30px; text-align:left; border-top:1px solid #eee; padding-top:25px;">
                        <h4 style="margin-bottom:20px; color:#ff3b3f;">Your Service Provider</h4>

                        <div style="display:flex; align-items:flex-start; gap:20px; flex-wrap:wrap;">
                            <div>
                                <img id="provider_image" src="" alt="Provider Image" style="width:120px; height:120px; object-fit:cover; border-radius:10px; border:1px solid #ddd;">
                            </div>

                            <div style="flex:1; min-width:250px;">
                                <p><strong>Name:</strong> <span id="provider_name"></span></p>
                                <p><strong>Primary Skill:</strong> <span id="provider_skill"></span></p>
                                <p><strong>Experience:</strong> <span id="provider_experience"></span></p>
                                <p><strong>Languages:</strong> <span id="provider_languages"></span></p>
                                <p><strong>Phone:</strong> <span id="provider_phone"></span></p>
                                <p><strong>Email:</strong> <span id="provider_email"></span></p>
                                <p><strong>About:</strong> <span id="provider_about"></span></p>
                            </div>
                        </div>
                    </div>

                    <p id="debug_text" style="margin-top:20px; font-size:12px; color:#999;"></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $this->load->view("footer"); ?>
<?php $this->load->view("footerscript"); ?>

<script>
var bookingId = <?php echo (int)$booking->booking_id; ?>;
var checkUrl = "<?php echo base_url('check-booking-status'); ?>/" + bookingId;
var autoInterval = null;

function formatTime(seconds)
{
    var min = Math.floor(seconds / 60);
    var sec = seconds % 60;

    if (min < 10) min = '0' + min;
    if (sec < 10) sec = '0' + sec;

    return min + ':' + sec;
}

function setProviderData(provider)
{
    if (!provider) return;

    var providerImage = '';

    if (provider.profile_pic && provider.profile_pic !== '') {
        providerImage = "<?php echo base_url(); ?>" + provider.profile_pic;
    } else if (provider.coverpic && provider.coverpic !== '') {
        providerImage = "<?php echo base_url(); ?>" + provider.coverpic;
    } else {
        providerImage = "<?php echo base_url(); ?>assets/img/login.png";
    }

    document.getElementById('provider_image').src = providerImage;
    document.getElementById('provider_name').innerText = provider.owner_name ? provider.owner_name : '-';
    document.getElementById('provider_skill').innerText = provider.primary_skill ? provider.primary_skill : '-';
    document.getElementById('provider_experience').innerText = provider.experience ? provider.experience : '-';
    document.getElementById('provider_languages').innerText = provider.languages ? provider.languages : '-';
    document.getElementById('provider_phone').innerText = provider.contact_no ? provider.contact_no : '-';
    document.getElementById('provider_email').innerText = provider.email ? provider.email : '-';
    document.getElementById('provider_about').innerText = provider.about_me ? provider.about_me : '-';

    document.getElementById('provider_box').style.display = 'block';
}

function checkBookingStatus()
{
    fetch(checkUrl, {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(function(response){
        return response.json();
    })
    .then(function(data){
        document.getElementById('debug_text').innerText = 'Last updated: ' + new Date().toLocaleTimeString();

        if (typeof data.remaining_seconds !== 'undefined') {
            document.getElementById('timer_text').innerText = formatTime(data.remaining_seconds);
        }

        if (data.status === 'pending') {
            document.getElementById('status_text').innerText = 'Status: Pending';
        }
        else if (data.status === 'accepted') {
            document.getElementById('status_text').innerText = 'Status: Accepted';
            document.getElementById('timer_text').innerText = '00:00';
            setProviderData(data.provider);

            if (autoInterval) {
                clearInterval(autoInterval);
            }
        }
        else if (data.status === 'rejected') {
            document.getElementById('status_text').innerText = 'Status: Rejected';
            document.getElementById('timer_text').innerText = '00:00';

            if (autoInterval) {
                clearInterval(autoInterval);
            }
        }
        else if (data.status === 'expired') {
            document.getElementById('status_text').innerText = 'Status: Expired';
            document.getElementById('timer_text').innerText = '00:00';

            if (autoInterval) {
                clearInterval(autoInterval);
            }
        }
        else {
            document.getElementById('status_text').innerText = 'Status: Not Found';

            if (autoInterval) {
                clearInterval(autoInterval);
            }
        }
    })
    .catch(function(error){
        document.getElementById('debug_text').innerText = 'Error fetching status';
        console.log(error);
    });
}

checkBookingStatus();
autoInterval = setInterval(checkBookingStatus, 1000);
</script>

</body>
</html>