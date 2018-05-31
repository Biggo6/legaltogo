<div class="form-group" id="currentPasswordArea">
  <span style="display: flex; justify-content: space-between; margin-bottom: 10px">
    <label for="currentPassword">New Password:</label>
  </span>
  <input type="password" required class="form-control validate[required,funcCall[checkPassMatch[confirmPassword]]]" data-errormessage-value-missing="Current Password is required!" value="" data-prompt-position="bottomRight" id="newPassword" name="newPassword" placeholder="Enter New Password">
</div>

<div class="form-group" id="currentPasswordArea">
  <span style="display: flex; justify-content: space-between; margin-bottom: 10px">
    <label for="currentPassword">Confirm Password:</label>
  </span>
  <input type="password" required class="form-control validate[required, funcCall[checkPassMatch[newPassword]]]" data-errormessage-value-missing="Current Password is required!" value="" data-prompt-position="bottomRight" id="confirmPassword" name="confirmPassword" placeholder="Enter Confirm Password">
</div>
<hr/>
@include('partials._buttonSave', ['btnId'=>'updatePassword', 'title'=>'Update Password'])

<?php

$customCodes = '
  Biggo.showFeedBack("#currentPasswordArea", "Successfully changed!", false);
  setTimeout(function() {
      window.location = "";
  }, 2000)
';

?>

@include('partials._saveFunc', ['btnID'=>'updatePassword', 'formID'=>'registerForm_CPass', 'route'=>'app.changePassword', 'routeWith'=>'permissions.refreshWith', 'redirectable'=>false, 'customCodes' => $customCodes])
