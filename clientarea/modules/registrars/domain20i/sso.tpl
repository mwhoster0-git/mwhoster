<h4>Sending you to your control panel...</h4>
{if $success}
  <p>
    Please
    <a id='redirect-link' href='{$redirectTo}' target="_blank">click here</a>
    if you don't get redirected automatically
  </p>
  <script>
    location.href = document.querySelector("#redirect-link").href;
  </script>
{else}
  <p>Sorry, that didn't work. The error was: {$errorMsg}
{/if}
