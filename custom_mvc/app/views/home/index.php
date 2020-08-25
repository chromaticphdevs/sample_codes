<?php build('content') ?>
<div class="text-center">
  <h2>How to use Custom MVC</h2>
</div>
<div class="row">
  <div class="col-md-5">
    <section>
      <div class="card">
        <div class="card-header"><h4>Setting-Up Virtual Host</h4></div>
        <div class="card-body">
          <ol>
            <li>Link| <a href="https://www.cloudways.com/blog/configure-virtual-host-on-windows-10-for-wordpress/" target="_blank">Virtual Host Setup</a></li>
            <li> Run Notepad As Administrator </li>
            <li> Then, edit httpd-vhosts.conf. </li>
            <li> You Can change the environment type on setup.php</li>
            <li> Locate C:\Windows\System32\drivers\etc\hosts</li>
          </ol>
        </div>
      </div>
    </section>

    <section>
      <div class="card">
        <div class="card-header"><h4>Setting-Up PHP Configuration</h4></div>
        <div class="card-body">
          <ol>
            <li> Go to app/config folder</li>
            <li> Open setup_loader.php automatically the framework will be set to local Environment</li>
            <li> You Can change the environment type on setup.php</li>
            <li> Add your url and database informations
              <div>
                <img src="<?php echo _path_asset('setup.PNG')?>" style="width: 300px;">
              </div>
            </li>
          </ol>
        </div>
      </div>
    </section>

    <section>
      <div class="card">
        <div class="card-header">
          <h4>Setting-Up JAVASCRIPT Configuration</h4>
        </div>
        <div class="card-body">
          <ol>
            <li> Go to public/js folder</li>
            <li> Open core.js</li>
            <li> Add your URL to the URL constant 
              <div>
                <img src="<?php echo _path_asset('setup_javascript.PNG')?>" style="width: 300px;">
              </div>
            </li>
          </ol>
        </div>
      </div>
    </section>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header"><h4>Helpers</h4></div>
      <div class="card-body">
        <ul>
          <li><a href="/Helper/?helper=form">Form Builder Hepler</a></li>
          <li><a href="/Helper/?helper=flash">Flash/Popups Hepler</a></li>
          <li><a href="/Helper/?helper=upload">File Uploader Helper</a></li>
          <li><a href="/Helper/?helper=array">Array Helpers</a></li>
          <li><a href="/Helper/?helper=query">Query Helpers</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php endbuild()?>

<?php occupy('templates/base');?>


