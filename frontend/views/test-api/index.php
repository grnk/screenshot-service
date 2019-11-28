<?php

$this->title = 'test api';

?>
<form action="http://sj.roman.p.virtual1.webdoka.net/screenshot/s-shot" method="GET">
    <div>
        <label for="url">url *</label>
        <input id="url" type="text" name="url">
    </div>
    <div>
        <label for="resolution">resolution</label>
        <input id="resolution" type="text" name="resolution" value="1024">
    </div>
    <div>
        <label for="width">width</label>
        <input id="width" type="text" name="width" value="800">
    </div>
    <input type="submit" name="submit">
</form>