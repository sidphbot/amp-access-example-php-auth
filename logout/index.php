<?php
// destroy session
setcookie ("auth", "", time() - 3600, "/");
setcookie ("admin", "", time() - 3600, "/");
// close logout window
?>
<script type="text/javascript">
        window.onload = function(e) {
                window.close();
        }
</script>