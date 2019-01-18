 <?php 

   get_header(); 
   
   while(have_posts()){
    the_post();  ?>
    
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/banner.png') ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title t-center"><?php the_title();?></h1>
      <div class="page-banner__intro t-center">
      </div>
    </div>  
  </div>
  
  <section>
  <div class="vertical-menu">
     <h2 class="headline headline--medium t-center" style="background-color: white; color: #2D054D; padding-left:0; padding-right:0">CONTENTS</h2>
     <h2 style= "padding-left:10%; text-align-last: left;">
      <ul>
        <li><a href= "<?php echo site_url()?>"><h3><b>Home page</b></h3></a></li>

        <li><a href="<?php echo site_url('/slicer-roadmap')?>"><h3><b>3D Slicer architecture</b></h3></a></li>
        
        <li class= "b"><a href="<?php echo site_url('/slicer-roadmap')?>" style="text-decoration:none"><h3>MRML Scene</a></h3></li>
        <li class= "c">MRML Nodes</li>
        <li class= "b"><a href="<?php echo site_url('/slicer-roadmap')?>#widget" style="text-decoration:none"><h3>Widget</a></h3></li>
        <li class= "b"><a href="<?php echo site_url('/slicer-roadmap')?>#logic" style="text-decoration:none"><h3>logic</a></h3></li>

        <li><a href="<?php echo site_url('/igt-module')?>"><h3><b>IGT module development</b></h3></a></li>
        
        <li class= "b"><a href="<?php echo site_url('/igt-module')?>#slicerComps" style="text-decoration:none"><h3>Slicer Components</a></h3></li>
        <li class= "c">What is a module?</li>
        <li class= "c">What is the SlicerIGT extension?</li>
        <li class= "c">What is an extension?</li>
        <li class= "b"><a href="<?php echo site_url('/igt-module')?>#pluscomps" style="text-decoration:none"><h3>PlusServer Components</a></h3></li>
        <li class= "c">What is the PlusServer?</li>
        <li class= "c">What is the OpenIGTLinkIF?</li>
        <li class= "b"><a href="<?php echo site_url('/igt-module')?>#streamims" style="text-decoration:none"><h3>Streaming images and tracking data</a></h3></li>
        
        <li><a href="<?php echo site_url('/igt-demo')?>"><h3><b>Examples and Demonstrations</b></h3></a></li>
        
        <li class= "b"><a href="<?php echo site_url('/igt-demo')?>#overview" style="text-decoration:none"><h3>Overview</a></h3></li>
        <li class= "c">3D SlicerIGT extension installation</li>
        <li class= "c">3D SlicerIGT extension installation</li>
        <li class= "b"><a href="<?php echo site_url('/igt-demo')?>#plusConfig" style="text-decoration:none"><h3>PlusServer Configuration Files</a></h3></li>
        <li class= "c">What is a configuration file?</li>
        <li class= "c">Configuration file details</li>
        <li class= "c">Configuration file for "US Calibration module"</li>
        <li class= "c">How to write your own configuration file</li>
        <li class= "b"><a href="<?php echo site_url('/igt-demo')?>#cal" style="text-decoration:none"><h3>Calibration of ultrasound and tools</a></h3></li>
        <li class= "c">Demo 1: Pivot Calibration </li>
        <li class= "c">Demo 2: Ultrasound probe calibration </li>
        
        <li><a href="<?php echo site_url('/create-module')?>"><h3><b>Create your own module</b></h3></a></li>
        <li class= "b"><a href="<?php echo site_url('/create-module')?>#devmodes"><h3>Development modes</a></h3></li>
        <li class= "c">Scipted modules</li>
        <li class= "c">Loadable modules</li>
        <li class= "b"><a href="<?php echo site_url('/create-module')?>#create"><h3>Create a module</a></h3></li>
        <li class= "b"><a href="<?php echo site_url('/create-module')?>#addmod"><h3>Add module to an extension</a></h3></li>
    </ul>
  </h2>
</div>

  <div class="container container--narrow--content page-section">
    
  <!--  -->

<div class="generic-content">
     <!-- <?php /*the_content();*/?> -->

<!-- *********************************************************************************************************************************** -->

<?php
if(is_page(array('3D Slicer Architecture'))) {?> 

<h3  class="headline headline--small-plus t-center" style="background-color: white;"><a id ="mrmlScene">MRML SCENE</a></h3>

<div style="background-color: #D7E3ED;background-size: contain; color: black;">

<h4 style= " padding-left:5%; padding-right:5%;padding-top:1%; text-align-last: left;">


In 3D Slicer, the MRML scene can be thought of as the workspace, consisting of everything that you interact with, including streaming data, segmentations, models, view layout, etc. In addition, the scene can include components that are not directly visualized. A  scene can be saved and loaded  at a later time, maintaining the same appearance, data and everything else included in the scene. The scene can also be "closed" removing the scene and providing a fresh workspace (File&gt;close scene or via code: slicer.mrmlScene.Clear() ). All the components in the scene are called MRML nodes. In other words, the MRML scene manages MRML nodes.

<br>

<br>

<b><a id="mrmlnodes">MRML Nodes</a></b>


<br/>

A MRML nodes can be thought of as a container that holds attributes of the node and references connecting it to other nodes. There are three main node types: data nodes, display nodes, and storage nodes.


<ul>
  <li>Data nodes stores data. For example this includes streaming ultrasound images, tracking information and transforms, models, segmented images, etc.</li>
  <li>Display nodes store the visualization attributes for a data node.  For visualizing the same information multiple ways, a data node can be referenced to multiple display nodes.</li>
  <li>Storage node stores the file name and format for a data node. This is only created when data is loaded from or saved to the persistent storage (disk) or your computer.</li>
</ul>
Regardless of the node type, each node has the following properties.
<ul>
  <li>Attributes can be thought of as variables of MRML nodes. For example, a data node containing an image volume could have attributes storing voxel spacing, position, or orientation. An example of an attribute for a display node is the display name. Similarly, a storage node has a file name attribute.</li>
  <li>References allow nodes to interact with other nodes of any type. For example, a model node may reference a transform node in order to apply the transform to the model.</li>
  <li>Events and observers describe a system in which nodes emit events that can be observed by other nodes to allow them to make the appropriate changes. For example, when a transform node is updated, it will emit an event notifying all observers (such as the models that reference it) that it has been modified.</li>
</ul>
&nbsp;
</h4>
</div>

<div style="background-color: #f1f1f1; background-size: contain; color: black; padding-top: 4%;">
<h1></h1>
</div>

<h3 class="headline headline--small-plus t-center" style="background-color: white;"><a id = "widget">WIDGET</a></h3>

<div style="background-color: #D7E3ED;background-size: contain; color: black;">
<h4 style= " padding-left:5%; padding-right:5%;padding-top:1%; text-align-last: left;">

Widgets are the building blocks or individual components of the graphic user interface. In 3D Slicer, the GUI utilizes the Qt framework that enables the design and development of cross platform (ie. Windows, Mac, and Linux) user interfaces. 3D Slicer can access all the Qt classes. In addition to all these available classes, 3D Slicer provides a selection of widgets for interacting with MRML nodes. These Slicer widgets follow the naming convention qMRML[custom name], where "custom name" differs based on the functionality of the widget.
&nbsp;
<br>

<br>
</h4>
</div>

<div style="background-color: #f1f1f1; background-size: contain; color: black; padding-top: 4%;">
<h1></h1>
</div>


<h3 class="headline headline--small-plus t-center" style="background-color: white;"><a id = "logic">LOGIC</a></h3>

<div style="background-color: #D7E3ED;background-size: contain; color: black;">
<h4 style= " padding-left:5%; padding-right:5%;padding-top:1%; text-align-last: left;">

Logic is the bulk of the processing of any application. The logic will control the MRML nodes and the view. For example, if a button within the GUI is dedicated to streaming ultrasound clicking the button will run the logic controlling this connection. Once the connection is established, the logic can output the ultrasound stream for viewing.
<ul>
  <li>Best development practices in 3D Slicer encourages the following naming convention for logic functions: vtk[custom logic function]Logic.</li>
  <li>Any function written in the logic section of a published module can be called on and reused by other developers.</li>
</ul>
&nbsp;
</h4>
</div>
<?php } ?>


<!-- *********************************************************************************************************************************** -->
<?php
if(is_page(array('IGT Module Development'))) {?> 
<h3 class="headline headline--small-plus t-center" style="background-color: white;"><a id = "slicerComps">SLICER COMPONENTS</a></h3>

<div style="background-color: #D7E3ED;background-size: contain; color: black;">
<h4 style= " padding-left:5%; padding-right:5%;padding-top:1%; text-align-last: left;">

<b>What is a module?</b>
<ul>
  <li>There are three types (for more information click <a href="https://www.slicer.org/wiki/Documentation/Nightly/Developers/Modules">here</a>!):
<ul>
  <li>CLI modules
<ul>
  <li>Are written as an .xml document.</li>
  <li>Used to wrap inputs and outputs to a pre-existing command line program.</li>
</ul>
</li>
  <li>Scripted modules
<ul>
  <li>Are written in python.</li>
  <li>Can be developed using a downloaded and installed 3D Slicer.</li>
  <li>This is ideal for beginners and quick prototyping. </li>
</ul>
</li>
  <li>Loadable modules 
<ul>
  <li>Are written in C++.</li>
  <li>Have to build your own 3D Slicer in order to develop, click <a href='https://www.slicer.org/wiki/Documentation/Nightly/Developers/Build_Instructions'> here </a> for build instructions. 
<ul>
  <li>i.e. compile 3D Slicer source code using CMake and operating specific build tools (Visual Studio, g++, XCode, etc...).</li>
</ul>
</li>
  <li>This is preferred by experienced developers and provides higher functionality.</li>
</ul>
</li>
</ul>
</li>
</ul>

<b>What is an <a href="https://www.slicer.org/wiki/Documentation/Nightly/SlicerApplication/ExtensionsManager#What_is_an_extension_.3F">extension</a>?</b>
<ul>
  <li>An extension in 3D Slicer is a collection of one or more modules that typically have some commonality between them.</li>
  <li>The extensions that are available in the 3D Slicer extension manager have been approved by the 3D Slicer team.</li>
</ul>

<b>What is the<a href="http://www.slicerigt.org/wp/"> SlicerIGT</a> extension?</b>

<ul>
  <li>The SlicerIGT extension contains many modules that provide functionality for performing various IGT tasks.</li>
  <li>One main purpose is it allows users to interact with different real time data sources (eg. ultrasound stream or tracking data).</li>
  <li>Real time data is currently captured and broadcasted to the <a href="http://perk-software.cs.queensu.ca/plus/doc/nightly/user/ApplicationPlusServer.html">PlusServer</a> from the Plus library.</li>
  <li> In 3D Slicer, this data is received through the OpenIGTLinkIF module within the IGT extension (Slicer version 4.8 and earlier) or <a href=" https://github.com/openigtlink/SlicerOpenIGTLink"> SlicerOpenIGTLink extension </a> (Slicer version 4.9 and later).</li>
</ul>

&nbsp;
</h4>
</div>

<div style="background-color: #f1f1f1; background-size: contain; color: black; padding-top: 4%;">
<h1></h1>
</div>

<div style="background-color: #D7E3ED;background-size: contain; color: black;">

<h3 class="headline headline--small-plus t-center" style="background-color: white;"><a id="pluscomps">PLUSSERVER COMPONENTS</a></h3>

<h4 style= " padding-left:5%; padding-right:5%;padding-top:1%; text-align-last: left;">

<b>What is the PlusServer?</b>

<ul>
  <li>The Plus Server is a PlusLibrary application that captures data from connected hardware, and broadcasts it to clients that connect.</li>
  <li>A server is a program that streams data from connected hardware such as an ultrasound system and/or tracking system.</li>
<ul>
  <li>This includes multiple transformations and only one image source per OpenIGTLink connection.</li>
</ul>
</li>
  <li>A client receives the data, which in this case is 3D Slicer.</li>
  <li>The connection between the PlusServer and 3D Slicer is created through the OpenIGTLinkIF module.</li>
  <li> The PlusServer can run on any computer that can access the data providing hardware. Some devices (ultrasounds, trackers, etc...) must be plugged in directly to the machine running Plus, and some devices are captured over a network.</li>
</ul>
<b>What is the<a href="https://www.slicer.org/wiki/Documentation/Nightly/Modules/OpenIGTLinkIF"> OpenIGTLinkIF module</a>?</b>
<ul>
  <li>OpenIGTLinkIF is a module that provides communication between 3D Slicer and an OpenIGTLink server which can be running, for example, on a computer connected to an ultrasound scanner.</li>
  <li>This module allows 3D Slicer to be a client and receive streaming data from external servers.</li>
</ul>

&nbsp;
</h4>

</div>

<div style="background-color: #f1f1f1; background-size: contain; color: black; padding-top: 4%;">
<h1></h1>
</div>

<h3 class="headline headline--small-plus t-center" style="background-color: white;"><a href="http://perk-software.cs.queensu.ca/plus/doc/nightly/user/ProcedureStreamingToSlicer.html" id="streamims">STREAMING IMAGES AND TRACKING DATA</a></h3>

<div style="background-color: #D7E3ED;background-size: contain; color: black;">

<h4 style= " padding-left:5%; padding-right:5%;padding-top:1%; text-align-last: left;">

<b>To stream ultrasound images and tracking data, follow these steps</b>

<ul>
  <li>Create an XML configuration file that specifies all the connected hardware to capture data from. This configuration file will be used by the PlusServer in the following step. Click <a href="http://perk-software.cs.queensu.ca/plus/doc/nightly/user/Configuration.html"> here</a> to learn more!</li>
  <li>Start PlusServerLauncher and connect to the configuration file you just created. Problems can be reported <a href = 'https://github.com/PlusToolkit/PlusLib/issues'> here</a>!</li>
  <li>Launch 3D Slicer
<ul>
  <li>Make sure that the SlicerIGT and SlicerOpenIGTLink extensions are installed through the extension manager (steps shown in Examples and demonstrations). </li>
</ul>
</li>
  <li>Select the OpenIGTLinkIF module from the IGT category and follow the following steps:</li>
</ul>
</h4>

<h4 style= " padding-left:8.5%; padding-right:5%;padding-top:1%; text-align-last: left;">

<img src= <?php echo get_theme_file_uri('/images/PlusConnect1August.png') ?> alt="" width="1024" height="765" />
<img src=<?php echo get_theme_file_uri('/images/PlusConnect2August.png') ?> alt="" width="1024" height="767"  />

<br>

<b>Figure 1:</b> (1) Load the OpenIGTLinkIF module (via the SlicerOpenIGTLink extension), (2) add an IGT connector by clicking on the +, (3) enter the IP address of the server (machine running PlusServer). Make sure the port number is the same as the port you specified in your configuration file, (4) select active to activate the connection and receive real-time data.

<br>

<br>

<img src=<?php echo get_theme_file_uri('/images/PlusConnect3August.png') ?> alt="" width="1024" height="479" />

<br>

<b>Figure 2:</b> To view the ultrasound images in Slicer, go to the Volume Reslice Driver module (within the IGT category). Under "Driver" choose the name of the image as specified in the configuration file running on the PlusServer. "Mode:" controls how the image will be displayed in Slicer, which must be set to "Transverse".

<br>

<br>

&nbsp;

</h4>

</div>

<?php } ?>
  
<!-- *********************************************************************************************************************************** -->
  
<?php
if(is_page(array('Examples and Demonstrations'))) {?> 


<h3 class="headline headline--small-plus t-center" style="background-color: white;"><a id="overview">OVERVIEW</a></h3>


<div style="background-color: #D7E3ED;background-size: contain; color: black;">

<h4 style= " padding-left:5%; padding-right:5%;padding-top:1%; text-align-last: left;">

Image-guided therapies (IGT) are medical procedures that use computer-based systems that provide navigation facilities and supplemental procedure information to help the physician precisely visualize and target the surgical site. The SlicerIGT extension provides a platform for rapid development of IGT applications. This extension provides a number of modules that can be used directly for performing IGT tasks. These modules can also be re-used (through code) for the development of a new IGT module. 

This page will take you through: 

<div style="padding-left:2%">

1. How to write configuration files (xml format) to connect to the PlusServer for broadcasting ultrasound images and tracking data to slicer. <br>
2. Two demos that show how to use two of the existing SlicerIGT modules (i.e. Pivot and ultrasound probe calibrations). These modules require either real-time tracking data and/or ultrasound streaming, which are acquired through the PlusSever. A link to the source code on GitHub is also provided. <br>
3. How to display a model of a tracked calibrated needle in slicer.

</div>
<br>

<b>Note:</b> This section will review a method for performing the pivot and ultrasound probe calibrations using two independent slicer modules. Other methods to perform these tasks include the <a href="http://perk-software.cs.queensu.ca/plus/doc/nightly/user/Calibration.html">Plus library</a>, or an independent method used by yourself or your lab.

<br>

<br> 

<b>3D SlicerIGT extension installation</b> <br>
Note: The OpenIGTLinkIF module is available within the IGT extension. The SlicerOpenIGTLink is also available as a stand alone extension in Slicer 4.9 and later, and can be installed separately from the SlicerIGT extension. 
<br>

<br>

<img style ='padding-left: 7%' src= <?php echo get_theme_file_uri('/images/IGTextension1August.png') ?> alt="" width="80%" ></img>
<img style ='padding-left: 7%' src= <?php echo get_theme_file_uri('/images/IGTextension2August.png') ?> alt="" width="80%" ></img>
<img style ='padding-left: 7%' src= <?php echo get_theme_file_uri('/images/IGTextension3August.png') ?> alt="" width="80%" ></img>

<br>

<div style="text-align:center">
<b>Figure 1:</b>  Steps for installing the SlicerIGT extension. 
</div>

<br>

<br>
&nbsp;

</div>

<div style="background-color: #f1f1f1; background-size: contain; color: black; padding-top: 4%;">
<h1></h1>
</div>

<h3 class="headline headline--small-plus t-center" style="background-color: white;"><a id="plusConfig">PLUSSERVER CONFIGURATION FILES</a></h3>

<div style="background-color: #D7E3ED;background-size: contain; color: black;">

<h4 style= " padding-left:5%; padding-right:5%;padding-top:1%; text-align-last: left;">

For more information on the PlusServer, see IGT module development.
<ul>
  <li>Download the correct PlusServer for your equipment <a href="http://perk-software.cs.queensu.ca/plus/packages/stable/">here</a>!</li>
</ul>
<b>What is a configuration file?</b>
<ul type="disc">
  <li> In the context of the PlusServer a configuration file contains all of the specific details needed to connect to attached hardware and broadcast the data. These details are specified in XML format.</li>
  <li>This file will provide the PlusServer with all the required information to connect tracking data and ultrasound streams with 3D Slicer.</li>
  <li>The contents of this file will differ based on the application and equipment being used.
<ul type="circle">
  <li> Note: PlusServer can connect to multiple tracking devices and a single image source such as an ultrasound scanner per OpenIGTLink connection.</li>
</ul>
</li>
</ul>

<b>Configuration file details</b>

<ul type="disc">
  <li>Note: each of these categories can have multiple entries. For more information click <a href ='http://perk-software.cs.queensu.ca/plus/doc/nightly/user/Configuration.html'>here</a>!</li>
  <li><b>Devices: </b>
<ol start="1" type="1">
  <li>Specify the devices being connected to (such as the image source or tracking device). This requires the names of data sources and the output channels to be specified.</li>
  <li> Optional: Specify the recording options, which allow you to save the data being streamed (streaming ultrasound or tracking data).</li>
</ol>
</li>
  <li><b>CoordinateDefinitions: </b>
<ol>
  <li>Specify the known transformation matrices. For example: pre-calculated ultrasound probe calibration or stylus pivot calibration matrices.</li>
  <li>Include identity matrices for any transformation that will be replaced.</li>
</ol>
</li>
  <li><strong>PlusOpenIGTLinkServer</strong><b>:</b>
<ol>
  <li>Specify the client parameters and information, this includes the listening port for OpenIGTLinkIF (18944).</li>
  <li>Specify the names of transformations and the image that will be broadcasted over the network, i.e. received by 3D Slicer.</li>
</ol>
</li>
</ul>

<b>Configuration file for "US Calibration module" using an Ultrasonix ultrasound system and an NDI Aurora tracker</b> <br>
 The following provides a description of the configuration file (i.e. in xml format) required for performing ultrasound probe calibration using the "US calibration module" in 3D Slicer. 
<ul>
  <li>To perform a probe calibration in 3D Slicer, the PlusServer is used to stream ultrasound and tracking data to 3D Slicer. This requires a specific xml file that follows the same format as above.</li>
  <li>Be sure to pay attention to the following components:</li>
  <li><b>Devices: </b>
<ol>
  <li>The "SerialPort" that your tracking device is connected to.</li>
  <li>The "PortName" numbers must be the same as the ports that your tools are plugged into on the tracker system control unit.</li>
  <li>The "IP" address of the ultrasound system you are using.</li>
  <li>The "PortUsImageOrientation" which controls the ultrasound image orientation in 3D Slicer. All the possible orientations are listed <a href="http://perk-software.cs.queensu.ca/plus/doc/nightly/user/Configuration.html#PortUsImageOrientation">here</a>!</li>
  <li>The "DepthMm" must be set to the ultrasound image depth that you are calibrating for, which will depend on your application.</li>
</ol>
</li>
</ul>
<ul>
  <li><b>CoordinateDefinitions: </b>
<ol>
  <li>Because the ultrasound probe calibration matrix is not known before performing the calibration this matrix must be sent to identity. This may look like: 
  &lt Transform From="Image" To="Probe" <br>
      Matrix="1  0  0  0 <br>
              0  1  0  0 <br>
              0  0  1  0 <br>
              0  0  0  1" <br> 
       Date="2018.07.08 13:54:00"/&gt
</li>
  <li>If the tool being used doesn't require calibration (such as a tracked NDI needle), this transformation matrix will also be the identity matrix. If the tool being used requires calibration, this matrix must be replaced with the needle tip-to-sensor calibration matrix (such as the transformation matrix produced by a pivot calibration).</li>
</ol>
</li>
</ul>
<b>How to write your own configuration file </b>
<ul>
  <li>A skeleton xml is available <a href="https://github.com/lgroves6/SlicerIGTDevelopment/blob/master/ConfigFileExample_IGTApplications.xml">here</a>!</li>
</ul>


&nbsp;
</div>


<div style="background-color: #f1f1f1; background-size: contain; color: black; padding-top: 4%;">
<h1></h1>
</div>

<h3 class="headline headline--small t-center" style="background-color: white;"><a id= "cal">CALIBRATION OF ULTRASOUND AND TOOLS</a></h3>

<div style="background-color: #D7E3ED;background-size: contain; color: black; ">

<br>

<h5 class="headline headline--small t-center" style="padding-left: 5%; padding-right: 5%">Demo 1: Pivot calibration for tracked tools (eg. stylus or needle) using SlicerIGT "Pivot Calibration" module
<hr>

</h5>
<h4 style= "padding-top: 1%; padding-left: 5%; padding-right: 5%; text-align-last: left;">

<b>Objectives</b>
<ul>
  <li>Find the transformation between the tool tip and the coordinates of the tracking sensor attached to it.</li>
  <li>This provides the location of the tool tip within the tracker coordinate system and allows integration of the tool in a VR/AR environment. Note that this process is only required if the tracked tool is NOT pre-calibrated.</li>
</ul>

<b>Required equipment</b>

<ul>
  <li>Surgical tool with a tracking sensor attached or built in.
<ul>
  <li>Eg. Magnetically tracked needle, stylus outfitted with an optical tracker etc.</li>
</ul>
</li>
</ul>
<ul>
  <li>Tracking system (optical or magnetic).
<ul>
  <li>Eg. NDI Aurora magnetic tracking system and Polaris optical tracking system.</li>
</ul>
</li>
</ul>
<img style="padding-left: 35%;" src= <?php echo get_theme_file_uri('/images/aurora.png') ?> alt="" width="263" height="192"></img>

<br>

<b>Where to find the module</b> <br>
Find the source code for the module <a href="https://github.com/SlicerIGT/SlicerIGT"> here</a>!

<img style="padding-left: 8.5%;" src= <?php echo get_theme_file_uri('/images/PivotDropDownAugust.png') ?> alt="" width="80%" height="663"></img>

<div style="text-align:center">
<b>Figure 2:</b> Accessing the pivot calibration module within the IGT extension. 
</div>

<br>

<b>How to use the module</b>
<br>
<video style= "padding-left: 8.5%" width="80%" height="576" controls>
<source src= "<?php echo get_theme_file_uri('/images/PivotCalDemoFinalTrim.mp4') ?>" type = "video/mp4"> </video>

<h1></h1>
&nbsp;
</div>


<div style="background-color: #f1f1f1; background-size: contain; color: black;">
<h1></h1>
</div>

<div style="background-color: #f1f1f1; background-size: contain; color: black; padding-top: 1%;">
<h1></h1>
</div>

<div style="background-color: #d7e3ed; background-size: contain; color: black; ">

<br>

<h5 class="headline headline--small t-center" style = "padding-left: 5%;padding-right: 5%">Demo 2: SlicerIGT "US calibration" module 
<hr>
</h5>

<br>
<h4 style= "padding-top: 1%; padding-left: 5%; padding-right: 5%; text-align-last: left;">
<b>Objectives </b>
<ul>
  <li>Find the transformation between the ultrasound image and the coordinates of the tracking sensor attached to the ultrasound probe.</li>
  <li>This enables placing the ultrasound image within the tracker coordinate system and integrating the image in a VR/AR environment.</li>
</ul>
<b> Required equipment </b>
<ul>
  <li>A pre-calibrated surgical tool with a tracking sensor attached or built in
<ul>
  <li>Eg. Magnetically tracked needle, stylus outfitted with a optical tracker etc.</li>
</ul>
</li>
  <li>Tracking system (optical or magnetic)
<ul>
  <li>Eg. NDI Aurora magnetic tracking system and Polaris optical tracking system</li>
</ul>
</li>
  <li>Ultrasound system
<ul>
  <li>Eg. SonixTouch by BK Medical</li>
</ul>
</li>
</ul>
<b>Required software and files</b>
<ul>
  <li>PlusServer launcher</li>
  <li>Xml file</li>
</ul>

<b>Where to find the module</b> <br>
Find the source code on GitHub <a href="https://github.com/VASST/SlicerVASST">here</a>!

<br> 

<!-- In slicer:


New screenshot ^^^^^^ -->
<br>

<b>How to use the module </b>
<br>
<video style= "padding-left: 8.5%" width="80%" height="576" controls>
<source src= "<?php echo get_theme_file_uri('/images/finalUScalvideo.mp4') ?>" type = "video/mp4"> </video>

&nbsp;

<br>

<br>
</div>

<div style="background-color: #f1f1f1; background-size: contain; color: black; padding-top: 4%;">
<h1></h1>
</div>

<!-- <h3 class="headline headline--small-plus t-center" style="background-color: white;">DISPLAYING A TRACKED CALIBRATED NEEDLE</h3>

<div style="background-color: #d7e3ed; background-size: contain; color: black;  padding-left: 40px; padding-right:40px;"> -->

<!-- **** Screen shots!!!************* -->

<!-- </div> -->
<?php 
} ?>


<!-- *********************************************************************************************************************************** -->

  <?php
if(is_page(array('Create Your Own Module!'))) {?> 
<h3 class="headline headline--small-plus t-center" style="background-color: white;"><a id= "devmodes">DEVELOPMENT MODES</a></h3>

<div style="background-color: #d7e3ed; background-size: contain; color: black;">

<br>

<h5 class="headline headline--small t-center" style = "padding-left: 5%; padding-right: 5%;">Scripted Module (i.e. development in Python)
<hr>
</h5>
<h4 style= "padding-top: 1%; padding-left: 5%; padding-right: 5%;text-align-last:left;">
<b> Description </b>

<br>

A scripted module is one way of developing a module in 3D Slicer. It is written using Python, and provides access to most classes required to build a module, such as all of VTK, most of ITK and Qt. If complete access to all of these classes is required, the module should be written in C++ (see the section below). For more information on scripted module development click <a href= "https://na-mic.org/wiki/2013_Project_Week_Breakout_Session:Slicer4Python#Notes_for_.22Real_World.22_usage"> here</a>!

<br>

<b> Advantages</b>
<br>

<ol>
      <li>Does not require extensive programming experience. </li>
      <li>Compatible with downloaded slicer, both nightly and stable releases, which means it does not require compiling Slicer from source code.</li>
      <li>The python console in 3D Slicer allows you to test parts of your code. Be aware that there are minor differences in coding structure between the console and your python script. </li>
</ol>   

<b>Development</b>

<br>

<ol>
      <li>To incorporate logic that was written in another scripted module in your module, you must use a scripted module yourself. </li>
      <li>Scripted modules can access logic class written in any C++ (loadable) module available in 3D Slicer using slicer.modules.[ModuleName].logic(). </li> 
      <li>ITK is available in scripted modules through SimpleITK. SimpleITK is slightly different than ITK. Please refer to SimpleITK documentation for more information, provided <a href="http://www.simpleitk.org/">here</a>.</li>
      <li>The Qt functions that are available for a scripted module have been converted to Python (I.e. Python wrapped) from C++. Due to this, the naming convention and functionality are not entirely consistent. Note: PyQt is a commercial product that is entirely separate from the Python wrapped Qt. To access these functions use: qt.Q[FunctionName]. </li>
      <li>All other normal python functionality can be accessed through a scripted module, including importing classes (eg. import numpy) </li>

</ol> 

<b>Sample code </b>

<br>

This section provides sample code for developing a 3D Slicer loadable module with IGT capabilities. This skeleton file is scripted in Python with specific IGT capabilities that you can use for development. If these capabilities are not useful for your application they can simply be commented out or removed from the script. A sample xlm file is also included to enable connection to the Plus Server. Sample code for a scripted module can be found <a href="https://github.com/lgroves6/SlicerIGTDevelopment/blob/master/YourModuleName.py"> here</a>! 
      
&nbsp;
<br>

<br>

</h4>
</div>

<div style="background-color: #f1f1f1; background-size: contain; color: black; padding-top: 1%;"></div>

<div style="background-color: #d7e3ed; background-size: contain; color: black;">

<br>

<h5 class="headline headline--small t-center" style = "padding-left: 5%; padding-right: 5%;">Loadable Module (i.e. development in C++)
<hr>
</h5>
<h4 style= "padding-top: 1%; padding-left: 5%; padding-right: 5%;text-align-last:left;">

<b> Description</b>
<br>
A loadable module is another way of developing a module in 3D Slicer. It is written using C++, and provides full access to VTK, ITK and Qt. Please refer to this page to learn how to create a loadable module <a href= "https://www.slicer.org/wiki/Documentation/4.5/Developers/Tutorials/CreateLoadableModule">here!</a> . 
<br>
<b> Advantages </b>
<br>
<ol>
      <li>Able to handle complex computations efficiently. </li>
      <li>Provides full control over the user interface. </li>
      <li>Enables logic classes to be reused by any other scripted or loadable module. </li>
</ol>   

<b>Development</b>
<br>
<ol>
      <li>Requires building Slicer in other words compiling Slicer from source code through CMake. Learn how to build Slicer <a href = "!https://www.slicer.org/wiki/Documentation/Nightly/Developers/Build_Instructions">here</a>! </li>      
      <li>Packaging a loadable module requires it to be complied in a similar manner to Slicer. Packing allows the modules to be loaded into Slicer.</li>
      <li>Developing loadable modules require more advanced coding skills and a background in C++ programing.</li>
</ol>

<h4> </h4>
&nbsp;
</h4>
</div>

<div style="background-color: #f1f1f1; background-size: contain; color: black; padding-top: 4%;">
<h1></h1>
</div>


<h3 class="headline headline--small-plus t-center" style="background-color: white;"><a id = "create">CREATE A MODULE</a></h3>


<div style="background-color: #d7e3ed; background-size: contain; color: black;">
<h4 style= "padding-top: 1%; padding-left: 5%; padding-right: 5%;text-align-last:left;">

Once the module type is decided, follow these step to create the folder and files for the module.
<br>

<img style ='padding-left: 8%' src= <?php echo get_theme_file_uri('/images/module1.png') ?> alt="" width="80%" ></img>
<br>
<br>
<img style ='padding-left: 8%' src= <?php echo get_theme_file_uri('/images/module2.png') ?> alt="" width="80%" ></img>
<br>
<br>
<img style ='padding-left: 8%' src= <?php echo get_theme_file_uri('/images/module3.png') ?> alt="" width="80%" ></img>
<br>
<br>
<img style ='padding-left: 8%' src= <?php echo get_theme_file_uri('/images/module4.png') ?> alt="" width="80%" ></img>
<br>
<br>
<img style ='padding-left: 8%' src= <?php echo get_theme_file_uri('/images/module5.png') ?> alt="" width="80%" ></img>
<br>
<br>
<img style ='padding-left: 8%' src= <?php echo get_theme_file_uri('/images/module6.png') ?> alt="" width="80%" ></img>

<div style = 'text-align: center;'>
<b> Figure 1: </b> Steps for creating your own module. </b>
</div>

<h4> </h4>
&nbsp;
<br>
<br>
</h4>
</div>


<div style="background-color: #f1f1f1; background-size: contain; color: black; padding-top: 4%;">
<h1></h1>
</div>


<h3 class="headline headline--small-plus t-center" style="background-color: white;"><a id="addmod">ADD MODULE TO AN EXTENSION<</h3>


<div style="background-color: #d7e3ed; background-size: contain; color: black;">
<h4 style= "padding-top: 1%;padding-left: 5%; padding-right: 5%; text-align-last:left;">
        
<!-- <h4 style= "padding-right: 20px; padding-left: 20px; padding-top: 5px; text-align-last:left;"> -->
        
To include your module into the 3D Slicer extension manager (i.e. make your module open source), follow the instructions below.
<ol>
      <li>Create a GitHub repository for your module </li>
      <li>Select the extension that fits your module best and send a pull request to that extension's GitHub.</li>
      <li>If your module doesn't fit into any existing extensions or you want to create a new extension, send a pull request to the general Slicer GitHub page. </li> 

<h4> </h4>
&nbsp;
</h4>
</div>

<?php } ?>

<!-- ************************************************************************************************************************************* -->
<?php 
if(is_page(array('Information'))) {?> 

<h3 class="headline headline--small-plus t-center" style="background-color: white;">ABOUT US</h3>
<div style="background-color: #D7E3ED;background-size: contain; color: black;">

<h4 style= "padding-right: 5%; padding-left: 5%; padding-top: 1%; text-align-last: left;">

We started this webpage as two frustrated graduate students struggling to understand the complex world of 3D Slicer! Our objective is to bring together and present key concepts in 3D Slicer module development with a focus on image-guided interventions in a simple way. We hope that this blog will reduce the learning curve and eliminate the fear of development with 3D Slicer for beginners.

We are members of the Virtual Augmentation and Simulation for Surgery and Therapy (VASST) lab at Robarts Research Institute at Western University. This lab focuses on developing virtual and augmented reality image guidance system to complement the traditional surgical field of view with additional information. Most of our software development for these systems is done using 3D Slicer because of its great community support and readily available tools and modules that can be used and built upon.
<br>
<br>

&nbsp;

</h4>
</div>

<div style="background-color: #f1f1f1; background-size: contain; color: black; padding-top: 4%;">
<h1></h1>
</div>

<h3 class="headline headline--small-plus t-center" style="background-color: white;">CONTACT</h3>
<div style="background-color: #D7E3ED;background-size: contain; color: black;">

<h4 style= "padding-right: 5%; padding-left: 5%; padding-top: 1%; text-align-last: left; line-height:1.8">
<!-- **** **** insert pictures (cool / HMD)********************** -->

<b>Leah Groves</b>, MESc Candidate,
Robarts Research Institute, School of Biomedical Engineering, Western University
lgroves6@uwo.ca
<br>
<b>Golafsoun Ameri</b>, PhD,
Robarts Research Institute, Western University
gameri@uwo.ca
&nbsp;
<br>
<br>

<img style ='padding-left: 10%' src= <?php echo get_theme_file_uri('/images/GoliandLeah.jpg') ?> alt="" width="80%" ></img>

<br>
<br>

</h4>
</div>

<div style="background-color: #f1f1f1; background-size: contain; color: black; padding-top: 4%;">
<h1></h1>
</div>

<h3 class="headline headline--small-plus t-center" style="background-color: white;">RESOURCES</h3>
<div style="background-color: #D7E3ED;background-size: contain; color: black;">

<h4 style= "padding-right: 5%; padding-left: 5%; padding-top: 1%; text-align-last: left;">

3D Slicer forum: <a href= "https://discourse.slicer.org/">https://discourse.slicer.org/</a>

<br>

SlicerIGT website: <a href= "http://www.slicerigt.org/wp/">http://www.slicerigt.org/wp/</a>

<br>

Slicer work week: <a href= "https://www.na-mic.org/wiki/2017_Winter_Project_Week">https://www.na-mic.org/wiki/2017_Winter_Project_Week</a>

<br>

Slicer webpage: <a href= "https://www.slicer.org/">https://www.slicer.org/</a>

&nbsp;

<br>
<br>

</h4>
</div>

<div style="background-color: #f1f1f1; background-size: contain; color: black; padding-top: 4%;">
<h1></h1>
</div>

<h3 class="headline headline--small-plus t-center" style="background-color: white;">ACKNOWLEDGEMENTS</h3>
<div style="background-color: #D7E3ED;background-size: contain; color: black;">

<h4 style= "padding-right: 5%; padding-left: 5%; padding-top: 1%; text-align-last: left; line-height:1.8">

Many people supported us throughout the development of this blog making significant contributions to the content. We would like to  specifically thank:
<br>

<b>Adam Rankin</b>, PhD Candidate, Biomedical Engineering
Adam is an experienced 3D Slicer developer who taught us integral slicer concepts and assisted us in the development of Slicer modules for our own research projects. His assistance and expertise continued through the development of this blog as he provided insightful feedback and helped clarify complex concepts.  
<br>


<b>Patrick Carmahan</b>, (Hons) BSc, Computer Science
Patrick provided insight into the 3D Slicer architecture, presenting high level concepts in simple language.
<br>

<b>Elvis Chen</b> and <b>Terry Peters</b>
Elvis and Terry supported us throughout this project and provided invaluable feedback on the content.
<br>

<b>The Virtual Augmentation and Simulation for Surgery and Therapy (VASST) lab </b>

<br>
<br>
<img style ='padding-left: 10%' src= <?php echo get_theme_file_uri('/images/July2017.jpg') ?> alt="" width="80%" ></img>

<br>
<br>

&nbsp;
</h4>
</div>


<?php } ?>

<!-- *********************************************************************************************************************************** -->
</div>

  </div>
  </section>
    
   <?php }

   get_footer(); 

?>


