<h1>Forum builon Laravel and Tailwind and AlpinJS</h1>
<ul>
    <li>CRUD action on Thread model</li>
    <li>Users can watch threads and are notified via email when new replies are submitted</li>
    <li>Admin privileges to delete threads and perform CRUD functions on channels that threads created belong to</li>
<li>Admin Dashboard to summarize all actions</li>
 </ul>
 
<div class="snippet-clipboard-content position-relative overflow-auto" data-snippet-clipboard-copy-content="git clone https://github.com/wasilolly/forum.git 
composer install
cp .env.example .env
">
<pre><code>git clone https://github.com/wasilolly/forum.git
composer install
cp .env.example .env
</code></pre>
</div>
<p>Then create the necessary database.</p>
<div class="snippet-clipboard-content position-relative overflow-auto" data-snippet-clipboard-copy-content="php artisan db
create database blog
">
<pre>
<code>php artisan db
create database forum
</code>
</pre>
</div>
<p>And run the initial migrations and seeders.</p>
<div class="snippet-clipboard-content position-relative overflow-auto" data-snippet-clipboard-copy-content="php artisan migrate --seed
">
<pre><code>php artisan migrate --seed
</code></pre>
</div>
