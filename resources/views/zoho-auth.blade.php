<form action="<?php echo 'https://accounts.zoho.com/oauth/v2/auth
?response_type=code&
client_id=1000.YXKQ0KE47Y0C6JMEPJ7B2PGUIFXUHY&
scope=ZohoCRM.settings.ALL&
redirect_uri=' . route('authtoken') . '&
prompt=consent'; ?>">
    <input type="submit" value="go">
    <input type="hidden" name="response_type" value="code"/>
    <input type="hidden" name="client_id" value="1000.YXKQ0KE47Y0C6JMEPJ7B2PGUIFXUHY"/>
    <input type="hidden" name="scope" value="ZohoCRM.settings.ALL"/>
    <input type="hidden" name="redirect_uri" value="{{ route('authtoken') }}"/>
    <input type="hidden" name="prompt" value="consent"/>
</form>
