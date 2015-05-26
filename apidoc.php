<?php
include("inc/startup.php");
if(!isLoggedIn())
{
	header("Location: login.php");
	die;
}
?>
<!DOCTYPE html>
<html lang="en-us">
	<head>
	<?php $tpl->title = APP_NAME . " - API Documentation"; include("templates/core/head.tpl.php"); ?>
	</head>
	<body <?php if($_SESSION['minify'] == true) { echo 'class="desktop-detected pace-done minified"'; } else { echo 'class=""';} ?>>

		<!-- HEADER -->
		<header id="header">
		<?php include("templates/core/header.tpl.php"); ?>
		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<?php include("templates/nav/left.tpl.php"); ?>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">
			   <!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Dashboard</li>
				</ol>
				<!-- end breadcrumb -->
			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-gear"></i> API <span>> Documentation</span></h1>
					</div>
				</div>

				<!-- row -->
				<div class="row">
						<!-- NEW WIDGET START -->
						<article class="col-sm-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-x" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false" data-widget-custombutton="false" data-widget-sortable="false">
					
								<header>
									<span class="widget-icon"> <i class="fa fa-align-justify"></i> </span>
									<h2>MuninMX RESTful API Documentation </h2>
								</header>
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
				
									<!-- widget content -->
									<div class="widget-body">

  <section id="wiki-content" class="wiki-content">
      <h1 id="markdown-header-basics">Basics</h1>
      
<h2 id="markdown-header-request-basics">Request Basics</h2>
<p>You can use POST or GET to communicate with the MuninMX API. The parameters <strong>apikey</strong> and <strong>method</strong> must be given.</p>
<p>Example:</p>
<div class="codehilite"><pre><span class="x">api.php?key=$apikey&amp;method=$apimethod</span>
</pre></div>


<p>Responses are always json encoded. If successfull the http response code is 200 and the body contains the json result.</p>

<hr>
<h2 id="markdown-header-return-codes">Return Codes</h2>
<p>On success HTTP Status is 200, other possible status codes are:</p>
<ul>
<li>404 (not found, as example listnodes method will issue 404 if you have no nodes)</li>
<li>403 forbidden (access denied)</li>
<li>400 bad request (parameter missing or other error)</li>
</ul>
<p>On failure a json encoded output will state the issue in a "msg" parameter, example:</p>
<div class="codehilite"><pre><span class="p">{</span><span class="nt">&quot;status&quot;</span><span class="p">:</span><span class="mi">400</span><span class="p">,</span><span class="nt">&quot;msg&quot;</span><span class="p">:</span><span class="s2">&quot;unknown method specified&quot;</span><span class="p">}</span>
</pre></div>


<hr>
<h2 id="markdown-header-api-caching">API Caching</h2>
<p>Please note that if you use GET that the API caches all results for 60 seconds. We recommend using GET for storage backend querys such as getChartData. </p>
<h1 id="markdown-header-api-methods">API Methods</h1>
<p>Some methods are only available to certain user roles (User Extended or Admin). You can see your user role status by using the getRole method.</p>
<h2 id="markdown-header-getrole">getRole</h2>
<p>Will return your user role.</p>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=getRole</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">{</span><span class="nt">&quot;role&quot;</span><span class="p">:</span><span class="s2">&quot;userext&quot;</span><span class="p">}</span>
</pre></div>


<p>Valid Roles are: user, userext and admin</p>

<hr>
<h2 id="markdown-header-listnodes">listNodes</h2>
<p>Will return a list of all your nodes.</p>
<p>Optional Parameter: &amp;search=</p>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=listNodes&amp;search=destiny</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">[</span>
    <span class="p">{</span>
        <span class="nt">&quot;id&quot;</span><span class="p">:</span> <span class="s2">&quot;1509&quot;</span><span class="p">,</span>
        <span class="nt">&quot;user_id&quot;</span><span class="p">:</span> <span class="s2">&quot;38&quot;</span><span class="p">,</span>
        <span class="nt">&quot;hostname&quot;</span><span class="p">:</span> <span class="s2">&quot;destiny.clavain.com&quot;</span><span class="p">,</span>
        <span class="nt">&quot;port&quot;</span><span class="p">:</span> <span class="s2">&quot;4949&quot;</span><span class="p">,</span>
        <span class="nt">&quot;query_interval&quot;</span><span class="p">:</span> <span class="s2">&quot;5&quot;</span><span class="p">,</span>
        <span class="nt">&quot;groupname&quot;</span><span class="p">:</span> <span class="s2">&quot;clavain&quot;</span><span class="p">,</span>
        <span class="nt">&quot;last_contact&quot;</span><span class="p">:</span> <span class="s2">&quot;2014-07-03 11:51:28&quot;</span><span class="p">,</span>
        <span class="nt">&quot;via_host&quot;</span><span class="p">:</span> <span class="s2">&quot;unset&quot;</span>
    <span class="p">}</span>
<span class="p">]</span>
</pre></div>

<hr>
<h2 id="markdown-header-getnode">getNode</h2>
<p>Will return all plugin and graph definitions from a node. <strong>nodeid parameter is required</strong></p>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=getNode&amp;nodeid=1509</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">{</span>
    <span class="nt">&quot;node&quot;</span><span class="p">:</span> <span class="p">{</span>
        <span class="nt">&quot;id&quot;</span><span class="p">:</span> <span class="s2">&quot;1509&quot;</span><span class="p">,</span>
        <span class="nt">&quot;user_id&quot;</span><span class="p">:</span> <span class="s2">&quot;38&quot;</span><span class="p">,</span>
        <span class="nt">&quot;hostname&quot;</span><span class="p">:</span> <span class="s2">&quot;destiny.clavain.com&quot;</span><span class="p">,</span>
        <span class="nt">&quot;port&quot;</span><span class="p">:</span> <span class="s2">&quot;4949&quot;</span><span class="p">,</span>
        <span class="nt">&quot;query_interval&quot;</span><span class="p">:</span> <span class="s2">&quot;5&quot;</span><span class="p">,</span>
        <span class="nt">&quot;groupname&quot;</span><span class="p">:</span> <span class="s2">&quot;clavain&quot;</span><span class="p">,</span>
        <span class="nt">&quot;last_contact&quot;</span><span class="p">:</span> <span class="s2">&quot;2014-07-03 13:21:28&quot;</span><span class="p">,</span>
        <span class="nt">&quot;via_host&quot;</span><span class="p">:</span> <span class="s2">&quot;unset&quot;</span>
    <span class="p">},</span>
    <span class="nt">&quot;plugins&quot;</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="nt">&quot;str_PluginName&quot;</span><span class="p">:</span> <span class="s2">&quot;cpu&quot;</span><span class="p">,</span>
            <span class="nt">&quot;str_PluginTitle&quot;</span><span class="p">:</span> <span class="s2">&quot;CPU usage&quot;</span><span class="p">,</span>
            <span class="nt">&quot;str_PluginInfo&quot;</span><span class="p">:</span> <span class="s2">&quot;This graph shows how CPU time is spent.&quot;</span><span class="p">,</span>
            <span class="nt">&quot;str_PluginCategory&quot;</span><span class="p">:</span> <span class="s2">&quot;system&quot;</span><span class="p">,</span>
            <span class="nt">&quot;str_PluginLabel&quot;</span><span class="p">:</span> <span class="s2">&quot;%&quot;</span><span class="p">,</span>
            <span class="nt">&quot;v_graphs&quot;</span><span class="p">:</span> <span class="p">[</span>
                <span class="p">{</span>
                    <span class="nt">&quot;str_GraphName&quot;</span><span class="p">:</span> <span class="s2">&quot;system&quot;</span><span class="p">,</span>
                    <span class="nt">&quot;str_GraphLabel&quot;</span><span class="p">:</span> <span class="s2">&quot;system&quot;</span><span class="p">,</span>
                    <span class="nt">&quot;str_GraphInfo&quot;</span><span class="p">:</span> <span class="s2">&quot;CPU time spent by the kernel in system activities&quot;</span><span class="p">,</span>
                    <span class="nt">&quot;str_GraphType&quot;</span><span class="p">:</span> <span class="s2">&quot;DERIVE&quot;</span><span class="p">,</span>
                    <span class="nt">&quot;str_GraphDraw&quot;</span><span class="p">:</span> <span class="s2">&quot;AREA&quot;</span><span class="p">,</span>
                    <span class="nt">&quot;b_isNegative&quot;</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
                    <span class="nt">&quot;bd_GraphValue&quot;</span><span class="p">:</span> <span class="mf">2.64</span><span class="p">,</span>
                    <span class="nt">&quot;bd_LastGraphValue&quot;</span><span class="p">:</span> <span class="mf">4.06</span><span class="p">,</span>
                    <span class="nt">&quot;bd_LastGraphValueCounter&quot;</span><span class="p">:</span> <span class="mi">48249528</span><span class="p">,</span>
                    <span class="nt">&quot;is_init&quot;</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
                    <span class="nt">&quot;i_lastGraphFetch&quot;</span><span class="p">:</span> <span class="mi">1404386479</span><span class="p">,</span>
                    <span class="nt">&quot;i_lastQueued&quot;</span><span class="p">:</span> <span class="mi">1404386479</span><span class="p">,</span>
                    <span class="nt">&quot;queryInterval&quot;</span><span class="p">:</span> <span class="mi">5</span>
                <span class="p">},</span>
                <span class="p">{</span>
                   <span class="err">..</span>
                 <span class="p">}</span>
              <span class="p">]</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="nt">&quot;str_PluginName&quot;</span><span class="p">:</span> <span class="s2">&quot;vmstat&quot;</span><span class="p">,</span>
            <span class="nt">&quot;str_PluginTitle&quot;</span><span class="p">:</span> <span class="s2">&quot;VMstat&quot;</span><span class="p">,</span>
            <span class="nt">&quot;str_PluginCategory&quot;</span><span class="p">:</span> <span class="s2">&quot;processes&quot;</span><span class="p">,</span>
            <span class="nt">&quot;str_PluginLabel&quot;</span><span class="p">:</span> <span class="s2">&quot;process states&quot;</span><span class="p">,</span>
            <span class="nt">&quot;v_graphs&quot;</span><span class="p">:</span> <span class="p">[</span>
                <span class="p">{</span>
                    <span class="nt">&quot;str_GraphName&quot;</span><span class="p">:</span> <span class="s2">&quot;wait&quot;</span><span class="p">,</span>
                    <span class="nt">&quot;str_GraphLabel&quot;</span><span class="p">:</span> <span class="s2">&quot;running&quot;</span><span class="p">,</span>
                    <span class="nt">&quot;str_GraphType&quot;</span><span class="p">:</span> <span class="s2">&quot;GAUGE&quot;</span><span class="p">,</span>
                    <span class="nt">&quot;b_isNegative&quot;</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
                    <span class="nt">&quot;bd_GraphValue&quot;</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
                    <span class="nt">&quot;bd_LastGraphValue&quot;</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
                    <span class="nt">&quot;bd_LastGraphValueCounter&quot;</span><span class="p">:</span> <span class="mi">0</span><span class="p">,</span>
                    <span class="nt">&quot;is_init&quot;</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
                    <span class="nt">&quot;i_lastGraphFetch&quot;</span><span class="p">:</span> <span class="mi">1404386488</span><span class="p">,</span>
                    <span class="nt">&quot;i_lastQueued&quot;</span><span class="p">:</span> <span class="mi">1404386488</span><span class="p">,</span>
                    <span class="nt">&quot;queryInterval&quot;</span><span class="p">:</span> <span class="mi">5</span>
                <span class="p">},</span>
                <span class="p">{</span>
                   <span class="err">..</span>
                <span class="p">}</span>      
            <span class="p">]</span>
        <span class="p">},</span>
        <span class="p">{</span>
           <span class="err">..</span>
        <span class="p">}</span>
    <span class="p">]</span>
<span class="p">}</span>
</pre></div>


<p>most fields in the response are self-explanatory. Some others:</p>
<ul>
<li>b_isNegative = is true when the graph delivers negative values, to be drawn negative on chart</li>
<li>bd_graphValue = the current value of this graph</li>
<li>bd_LastGraphValue = the value from the last graph fetch, required to calculate proper COUNT/DERIVE fields</li>
<li>bd_LastGraphValueCounter = used to calculate graphValue from 2 different fetches</li>
<li>is_init = true when this plugin is initialized. As example count/derive graphs only initialize after two runs</li>
<li>i_lastGraphFetch - unixtimestamp, last contact to munin node and fetch of graph values</li>
<li>i_lastQueued = unixtimestamp, time used for queuing it to the storage backend</li>
<li>queryInterval = interval in minutes in which we talk with the node</li>
</ul>
<p><strong>Values in this call will only refresh every QueryInterval based contact to the node. To fetch plugin values from the storage backend you need to issue a getChartData call</strong></p>

<hr>
<h2 id="markdown-header-getchartdata">getChartData</h2>
<p>Will return graph values from the storage backend for a given plugin. <strong>nodeid and plugin parameter is required</strong></p>
<p>Parameters:</p>
<ul>
<li>nodeid (numeric, required)</li>
<li>plugin (string, required)</li>
<li>start (integer, unixtimestamp, optional)</li>
<li>end  (integer, unixtimestamp, optional)</li>
</ul>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=getChartData&amp;nodeid=1509&amp;plugin=cpu&amp;start=1404395178</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">{</span>
    <span class="nt">&quot;system&quot;</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="nt">&quot;timestamp&quot;</span><span class="p">:</span> <span class="mi">1404395179</span><span class="p">,</span>
            <span class="nt">&quot;value&quot;</span><span class="p">:</span> <span class="s2">&quot;3.07&quot;</span>
        <span class="p">}</span>
    <span class="p">],</span>
    <span class="nt">&quot;user&quot;</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="nt">&quot;timestamp&quot;</span><span class="p">:</span> <span class="mi">1404395179</span><span class="p">,</span>
            <span class="nt">&quot;value&quot;</span><span class="p">:</span> <span class="s2">&quot;25.44&quot;</span>
        <span class="p">}</span>
    <span class="p">],</span>
    <span class="nt">&quot;nice&quot;</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="nt">&quot;timestamp&quot;</span><span class="p">:</span> <span class="mi">1404395179</span><span class="p">,</span>
            <span class="nt">&quot;value&quot;</span><span class="p">:</span> <span class="s2">&quot;0.00&quot;</span>
        <span class="p">}</span>
    <span class="p">],</span>
    <span class="nt">&quot;idle&quot;</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="nt">&quot;timestamp&quot;</span><span class="p">:</span> <span class="mi">1404395179</span><span class="p">,</span>
            <span class="nt">&quot;value&quot;</span><span class="p">:</span> <span class="s2">&quot;759.17&quot;</span>
        <span class="p">}</span>
    <span class="p">],</span>
    <span class="nt">&quot;iowait&quot;</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="nt">&quot;timestamp&quot;</span><span class="p">:</span> <span class="mi">1404395179</span><span class="p">,</span>
            <span class="nt">&quot;value&quot;</span><span class="p">:</span> <span class="s2">&quot;7.96&quot;</span>
        <span class="p">}</span>
    <span class="p">],</span>
    <span class="nt">&quot;irq&quot;</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="nt">&quot;timestamp&quot;</span><span class="p">:</span> <span class="mi">1404395179</span><span class="p">,</span>
            <span class="nt">&quot;value&quot;</span><span class="p">:</span> <span class="s2">&quot;0.00&quot;</span>
        <span class="p">}</span>
    <span class="p">],</span>
    <span class="nt">&quot;softirq&quot;</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="nt">&quot;timestamp&quot;</span><span class="p">:</span> <span class="mi">1404395179</span><span class="p">,</span>
            <span class="nt">&quot;value&quot;</span><span class="p">:</span> <span class="s2">&quot;1.22&quot;</span>
        <span class="p">}</span>
    <span class="p">],</span>
    <span class="nt">&quot;steal&quot;</span><span class="p">:</span> <span class="p">[],</span>
    <span class="nt">&quot;guest&quot;</span><span class="p">:</span> <span class="p">[]</span>
<span class="p">}</span>
</pre></div>


<p>By default if no start and end parameter is given this call will return data from the 30 days. You can specify a range by adding start and end as unix timestamp. If you only specify start it will use the current time as end range.</p>
<p>For label definitions of the single graph items per plugin you can use getNode</p>

<hr>
<h2 id="markdown-header-listbuckets">listBuckets</h2>
<p>returns a list of all your bucket stats</p>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=listBuckets</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">[</span>
    <span class="p">{</span>
        <span class="nt">&quot;id&quot;</span><span class="p">:</span> <span class="s2">&quot;3&quot;</span><span class="p">,</span>
        <span class="nt">&quot;user_id&quot;</span><span class="p">:</span> <span class="s2">&quot;1&quot;</span><span class="p">,</span>
        <span class="nt">&quot;statname&quot;</span><span class="p">:</span> <span class="s2">&quot;Service Calls / Hour&quot;</span><span class="p">,</span>
        <span class="nt">&quot;statlabel&quot;</span><span class="p">:</span> <span class="s2">&quot;Calls&quot;</span><span class="p">,</span>
        <span class="nt">&quot;created_at&quot;</span><span class="p">:</span> <span class="s2">&quot;2014-06-10 10:53:12&quot;</span><span class="p">,</span>
        <span class="nt">&quot;groupname&quot;</span><span class="p">:</span> <span class="s2">&quot;&quot;</span><span class="p">,</span>
        <span class="nt">&quot;statid&quot;</span><span class="p">:</span> <span class="s2">&quot;2462fbcdxerw4ffea1bb4b879de5be66dd9&quot;</span><span class="p">,</span>
        <span class="nt">&quot;username&quot;</span><span class="p">:</span> <span class="s2">&quot;apitest&quot;</span>
    <span class="p">}</span>
<span class="p">]</span>
</pre></div>

<hr>
<h2 id="markdown-header-getbucket">getBucket</h2>
<p>receive a single bucket. <strong>Required Parameter: bucketid (numeric)
</strong></p>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=getBucket&amp;bucketid=4</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">{</span><span class="nt">&quot;id&quot;</span><span class="p">:</span><span class="s2">&quot;4&quot;</span><span class="p">,</span><span class="nt">&quot;user_id&quot;</span><span class="p">:</span><span class="s2">&quot;1&quot;</span><span class="p">,</span><span class="nt">&quot;statname&quot;</span><span class="p">:</span><span class="s2">&quot;Tickets created \/ Hour&quot;</span><span class="p">,</span><span class="nt">&quot;statlabel&quot;</span><span class="p">:</span><span class="s2">&quot;Tickets&quot;</span><span class="p">,</span><span class="nt">&quot;created_at&quot;</span><span class="p">:</span><span class="s2">&quot;2014-06-10 13:14:36&quot;</span><span class="p">,</span><span class="nt">&quot;groupname&quot;</span><span class="p">:</span><span class="s2">&quot;&quot;</span><span class="p">,</span><span class="nt">&quot;statid&quot;</span><span class="p">:</span><span class="s2">&quot;22cxxxxx371572ca890f940964&quot;</span><span class="p">}</span>
</pre></div>

<hr>
<h2 id="markdown-header-getbucketdata">getBucketData</h2>
<p>returns data from the storage backend for that bucket. **Required Parameter: bucketid (numeric)</p>
<p>By default will only return the last 30/31 days. You can add <strong>start</strong> and <strong>end</strong> parameter (numeric) with a unixtimestamp for better range results.</p>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=getBucketData&amp;bucketid=4&amp;start=1404463401</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">[</span>
    <span class="p">{</span>
        <span class="nt">&quot;value&quot;</span><span class="p">:</span> <span class="s2">&quot;3&quot;</span><span class="p">,</span>
        <span class="nt">&quot;timestamp&quot;</span><span class="p">:</span> <span class="mi">1404464401</span>
    <span class="p">},</span>
    <span class="p">{</span>
        <span class="nt">&quot;value&quot;</span><span class="p">:</span> <span class="s2">&quot;5&quot;</span><span class="p">,</span>
        <span class="nt">&quot;timestamp&quot;</span><span class="p">:</span> <span class="mi">1404468001</span>
    <span class="p">},</span>
    <span class="p">{</span>
        <span class="nt">&quot;value&quot;</span><span class="p">:</span> <span class="s2">&quot;3&quot;</span><span class="p">,</span>
        <span class="nt">&quot;timestamp&quot;</span><span class="p">:</span> <span class="mi">1404471601</span>
    <span class="p">}</span>
<span class="p">]</span>
</pre></div>

<hr>
<h2 id="markdown-header-listgroups">listGroups</h2>
<p>return all groups from nodes</p>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=listGroups</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">[{</span><span class="nt">&quot;group&quot;</span><span class="p">:</span><span class="s2">&quot;clavain&quot;</span><span class="p">,</span><span class="nt">&quot;nodes&quot;</span><span class="p">:</span><span class="mi">1</span><span class="p">}]</span>
</pre></div>

<hr>
<h2 id="markdown-header-listnodesbygroup">listNodesByGroup</h2>
<p>return all nodes from a given group. <strong>group parameter (string) is required</strong></p>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=listNodesByGroup&amp;group=clavain</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">[</span>
    <span class="p">{</span>
        <span class="nt">&quot;id&quot;</span><span class="p">:</span> <span class="s2">&quot;1509&quot;</span><span class="p">,</span>
        <span class="nt">&quot;user_id&quot;</span><span class="p">:</span> <span class="s2">&quot;38&quot;</span><span class="p">,</span>
        <span class="nt">&quot;hostname&quot;</span><span class="p">:</span> <span class="s2">&quot;destiny.clavain.com&quot;</span><span class="p">,</span>
        <span class="nt">&quot;port&quot;</span><span class="p">:</span> <span class="s2">&quot;4949&quot;</span><span class="p">,</span>
        <span class="nt">&quot;query_interval&quot;</span><span class="p">:</span> <span class="s2">&quot;5&quot;</span><span class="p">,</span>
        <span class="nt">&quot;groupname&quot;</span><span class="p">:</span> <span class="s2">&quot;clavain&quot;</span><span class="p">,</span>
        <span class="nt">&quot;last_contact&quot;</span><span class="p">:</span> <span class="s2">&quot;2014-07-04 15:19:23&quot;</span><span class="p">,</span>
        <span class="nt">&quot;via_host&quot;</span><span class="p">:</span> <span class="s2">&quot;unset&quot;</span>
    <span class="p">}</span>
<span class="p">]</span>
</pre></div>

<hr>
<h2 id="markdown-header-addbucket">addBucket</h2>
<p>create a new bucketstat</p>
<p>graphname and graphlabel parameters are required. groupname parameter is optional.</p>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=addBucket&amp;graphname=People%20in%20Room&amp;graphlabel=people</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">{</span><span class="nt">&quot;statid&quot;</span><span class="p">:</span><span class="s2">&quot;9704988a5bf1e56e437176d150bff3b9083b4e9e&quot;</span><span class="p">,</span><span class="nt">&quot;statlabel&quot;</span><span class="p">:</span><span class="s2">&quot;people&quot;</span><span class="p">,</span><span class="nt">&quot;statname&quot;</span><span class="p">:</span><span class="s2">&quot;People in Room&quot;</span><span class="p">,</span><span class="nt">&quot;groupname&quot;</span><span class="p">:</span><span class="s2">&quot;&quot;</span><span class="p">}</span>
</pre></div>

<hr>
<h2 id="markdown-header-editbucket">editBucket</h2>
<p>edit a buckets name, label.</p>
<p>bucketid, graphname and graphlabel are required. groupname is optional.</p>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=editBucket&amp;bucketid=11&amp;graphname=humans%20in%20room&amp;graphlabel=humans</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">{</span><span class="nt">&quot;id&quot;</span><span class="p">:</span><span class="s2">&quot;11&quot;</span><span class="p">,</span><span class="nt">&quot;user_id&quot;</span><span class="p">:</span><span class="s2">&quot;38&quot;</span><span class="p">,</span><span class="nt">&quot;statname&quot;</span><span class="p">:</span><span class="s2">&quot;humans in room&quot;</span><span class="p">,</span><span class="nt">&quot;statlabel&quot;</span><span class="p">:</span><span class="s2">&quot;humans&quot;</span><span class="p">,</span><span class="nt">&quot;created_at&quot;</span><span class="p">:</span><span class="s2">&quot;2014-07-07 12:26:28&quot;</span><span class="p">,</span><span class="nt">&quot;groupname&quot;</span><span class="p">:</span><span class="s2">&quot;&quot;</span><span class="p">,</span><span class="nt">&quot;statid&quot;</span><span class="p">:</span><span class="s2">&quot;9704988a5bf1e56e437176d150bff3b9083b4e9e&quot;</span><span class="p">}</span>
</pre></div>

<hr>
<h2 id="markdown-header-deletebucket">deleteBucket</h2>
<p>delete a bucketstat.</p>
<p>bucketid (numeric) is required</p>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=deleteBucket&amp;bucketid=11</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">{</span><span class="nt">&quot;status&quot;</span><span class="p">:</span><span class="s2">&quot;ok&quot;</span><span class="p">}</span>
</pre></div>


<h2 id="markdown-header-reloadplugins">reloadPlugins</h2>
<p>will try to reload plugins for the given node. This is useful if you added a new munin plugin. Plugins are only refreshed for the cache once per day if you not refresh yourself.</p>
<p>nodeid parameter (numeric) is reuqired.</p>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=reloadPlugins&amp;nodeid=1509</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">{</span><span class="nt">&quot;status&quot;</span><span class="p">:</span><span class="s2">&quot;ok&quot;</span><span class="p">}</span>
</pre></div>

<hr>
<h2 id="markdown-header-addnode">addNode</h2>
<p>add a new munin-node for monitoring.</p>
<p>Required Parameters:</p>
<ul>
<li>hostname - string, hostname of the machine</li>
<li>port - integer, port for munin-node connection</li>
<li>interval - integer, 1,5,10 or 15  . The interval in minutes for receiving graphs</li>
</ul>
<p>Optional Parameters:</p>
<ul>
<li>groupname - string, optional groupname</li>
<li>viahost - contact this node via another munin host. (must be hostname) required for some snmp plugins. </li>
<li>authpw - string, required if you use muninmxauth plugin, only allow connection to munin node with proper password </li>
</ul>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=addNode&amp;hostname=clavain.com&amp;port=4949&amp;interval=10</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">{</span><span class="nt">&quot;id&quot;</span><span class="p">:</span><span class="s2">&quot;1512&quot;</span><span class="p">,</span><span class="nt">&quot;user_id&quot;</span><span class="p">:</span><span class="s2">&quot;38&quot;</span><span class="p">,</span><span class="nt">&quot;hostname&quot;</span><span class="p">:</span><span class="s2">&quot;clavain.com&quot;</span><span class="p">,</span><span class="nt">&quot;port&quot;</span><span class="p">:</span><span class="s2">&quot;4949&quot;</span><span class="p">,</span><span class="nt">&quot;query_interval&quot;</span><span class="p">:</span><span class="s2">&quot;10&quot;</span><span class="p">,</span><span class="nt">&quot;groupname&quot;</span><span class="p">:</span><span class="s2">&quot;&quot;</span><span class="p">,</span><span class="nt">&quot;last_contact&quot;</span><span class="p">:</span><span class="kc">null</span><span class="p">,</span><span class="nt">&quot;via_host&quot;</span><span class="p">:</span><span class="s2">&quot;unset&quot;</span><span class="p">}</span>
</pre></div>


<h2 id="markdown-header-deletenode">deleteNode</h2>
<p>delete a node from the system. dequeue from collector, remove plugin cache and delete all associated graph data.</p>
<p>nodeid parameter is required.</p>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=deleteNode&amp;nodeid=1509</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">{</span><span class="nt">&quot;status&quot;</span><span class="p">:</span><span class="s2">&quot;ok&quot;</span><span class="p">}</span>
</pre></div>

<hr>
<h2 id="markdown-header-editnode">editNode</h2>
<p>all parameters optional and required from addNode are required. <strong>You also need to specify the nodeid (numeric) parameter</strong>:</p>
<p>Required Parameters:</p>
<ul>
<li>hostname - string, hostname of the machine</li>
<li>port - integer, port for munin-node connection</li>
<li>interval - integer, 1,5,10 or 15  . The interval in minutes for receiving graphs</li>
</ul>
<p>Optional Parameters:</p>
<ul>
<li>groupname - string, optional groupname</li>
<li>viahost - contact this node via another munin host. required for some snmp plugins. </li>
<li>authpw - string, required if you use muninmxauth plugin, only allow connection to munin node with proper password </li>
</ul>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&amp;method=editNode&amp;nodeid=1509&amp;hostname=destiny.clavain.com&amp;port=4949&amp;interval=5&amp;groupname=clavain</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre><span class="p">{</span><span class="nt">&quot;status&quot;</span><span class="p">:</span><span class="s2">&quot;ok&quot;</span><span class="p">,</span><span class="nt">&quot;msg&quot;</span><span class="p">:</span><span class="s2">&quot;Node updated and requeued&quot;</span><span class="p">}</span>
</pre></div>

</section>

<hr>
<h2 id="markdown-header-editnode">packageList</h2>
<p>Returns a list of all tracked packages.</p>

<p>Optional Parameters</p>
<ul>
<li>node - numeric, id of a node for single packagelist of a selected node</li>
</ul>
<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&method=packageList</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre>
	{
    "packages": [
        {
            "package": {
                "name": "accountsservice 0.6.15-2ubuntu9.7",
                "pcount": 328,
                "affected_nodes": "1,2,3,4,5,6,7,21,22,400,402,403,404,408,439,449,459,470,472,482,491,500,508,510,511,513,520,526,530,534,539,550,551,554,556,566,576,577,583,589,593,599,603,610,613,615,624,630,631,639,644,646,647,648,650,660,661,662,664,665,670,672,673,677,685,689,693,702,703,708,715,718,726,728,733,736,743,751,752,760,761,764,766,769,771,778,783,788,795,797,800,820,825,826,828,829,830,844,845,846,855,856,859,868,869,870,872,873,874,879,890,897,903,904,906,913,915,918,922,925,933,941,942,946,954,956,959,961,968,969,970,971,977,982,985,986,988,991,996,1007,1012,1015,1025,1026,1029,1030,1032,1035,1039,1053,1056,1062,1067,1069,1072,1079,1087,1090,1101,1102,1108,1110,1112,1116,1136,1139,1144,1151,1156,1162,1173,1176,1181,1188,1193,1201,1202,1208,1210,1221,1224,1227,1231,1239,1252,1253,1254,1257,1260,1270,1275,1278,1280,1281,1283,1285,1286,1287,1299,1302,1305,1306,1309,1313,1314,1315,1318,1321,1322,1324,1326,1330,1331,1332,1335,1336,1337,1338,1339,1340,1352,1353,1386,1387,1390,1391,1392,1393,1394,1396,1397,1398,1399,1400,1401,1402,1403,1404,1405,1406,1407,1408,1409,1410,1411,1412,1413,1414,1415,1416,1417,1418,1419,1420,1421,1422,1423,1424,1426,1427,1428,1429,1430,1431,1432,1433,1434,1435,1436,1437,1438,1439,1440,1441,1442,1443,1444,1445,1446,1447,1448,1449,1450,1451,1452,1453,1454,1455,1457,1458,1459,1460,1461,1462,1463,1464,1465,1466,1515,1517,1523,1524,1529,1530,1531,1532,1533,1534,1562,1563,1564,1565,1566,1567,1568,1576,1577,1578,1579,1580,1590,1598,1599,1600,1603,1604,1606,1610"
            }
        },
        {
            "package": {
                "name": "acl 2.2.51-5ubuntu1",
                "pcount": 27,
                "affected_nodes": "1,2,21,22,400,408,535,662,707,807,816,870,968,1056,1278,1322,1390,1393,1396,1403,1406,1409,1424,1443,1457,1459,1460,1465"
            }
        }
    ]
    }
</pre></div>

<hr>
<h2 id="markdown-header-editnode">addEvent</h2>
<p>Add a event to graphs.</p>

<p>Required Parameters</p>
<ul>
<li>node OR group - for node, hostname or id of a node. For group a munin group</li>
<li>event_title - msg for the event</li>
</ul>
</ul>

<p>Optional Parameters</p>
<ul>
<li>event_start - unix timestamp</li>
<li>event_end - unix timestamp</li>
<li>color - orange, green, red, blue etc. red is default</li>
<li>update - true, can be used to execute a graph update on event save. only works with node, not group</li>
</ul>
</ul>

<p>Example Request:</p>
<div class="codehilite"><pre><span class="x">api.php?key=45396454349494ddcx&method=addEvent&event_title=Nagios Alert&color=red&node=app01-myserver.example.com</span>
</pre></div>


<p>Example Response:</p>
<div class="codehilite"><pre>
{
    "id": "5",
    "user_id": "1",
    "event_start": "1412230117",
    "event_end": "1412237317",
    "event_title": "Nagios ACK - WARNING - (WARN - /dev/sda1 - 81 - 9282859008)",
    "group": "",
    "color": "orange",
    "node": "42"
}
</pre></div>

    </section>
   

									
									</div>
								</div>
							</div>
						</article>
				</div>
				<!-- end row -->


			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->


		<!--================================================== -->
		<?php include("templates/core/scripts.tpl.php"); ?>
	</body>

</html>