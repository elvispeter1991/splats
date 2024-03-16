
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/js/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="/js/util.js"></script>
    <link rel="stylesheet" href="/css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <link rel="stylesheet" href="/css/main.css" type="text/css" media="screen" />
    <title>Mark Kellogg, Senior Software Engineer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="page">
    <br />
   
    
<title>Three.js - 3D Gaussian Splattting Examples</title>
<style>

    .page {
        background-color: #CCD5DE;
        height: 100vh;
        margin: 0px;
    }

    a {
      text-decoration: none;
      color: #3333CC;
    }

    a:hover {
      text-decoration: underline;
      color: #1111AA;
    }

    .demo-content {
      display: block;
      margin: 10px;
    }

    .header-content-container {
      background-color: #e7e9eb;
      border-radius: 7px;
      -moz-box-shadow: 0px 2px 10px -1px rgb(0 0 0 / 39%);
      -webkit-box-shadow: 0px 2px 10px -1px rgb(0 0 0 / 39%);
      box-shadow: 0px 2px 10px -1px rgb(0 0 0 / 39%);
      max-width: 1065px;
      min-width: 350px;
      margin: auto;
      font-family: "PT Sans", Arial, serif;
      font-size: 12pt;
    }

    .title {
      display: flex;
      text-align: center;
      padding: 10px;
      -moz-box-shadow: 0 5px 10px -5px #aaa;
      -webkit-box-shadow: 0 5px 10px -5px #aaa;
      box-shadow: 0 5px 10px -5px #aaa;
      margin-bottom: 15px;
      font-family: "PT Sans", Arial, serif;
      font-size: 15pt;
      color: #111111;
    }

    .small-title {
      font-family: "PT Sans", Arial, serif;
      font-size: 12pt;
      font-weight: bold;
      color: #333333;
    }

    .content-row {
      padding-left: 10px;
      padding-right: 10px;
      padding-top: 10px;
      padding-bottom: 10px;
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      text-align: center;
    }

    .demo-scene-panel {
      margin-top: 10px;
      margin-bottom: 10px;
      padding: 10px;
      color: #111111;
      border-radius: 7px;
      border: #bbbbbb 1px solid;
      background-color: #f1f1f1;
      width: 220px;
      margin-left: 8px;
      margin-right: 8px;
    }

    .demo-scene-panel:hover {
      color: #333333;
      border-color: #8a9ba8;
      background-color: #e4edfc;
      cursor: pointer;
    }

    .demo-scene-panel-image {
      width: 95%;
      border-radius: 5px;
      margin-bottom: 10px;
      width: 209px;
      height: 149px;
    }

    .button {
      color: #3C5060;
      border: #AEC5D7 1px solid;
      background-color: #E5EAEE;
      padding: 5px;
      border-radius: 3px;
      filter: drop-shadow(2px 2px 3px #aaaaaa);
    }

    .button:hover{
      cursor: pointer;
      color: #1B242B;
      background-color: #E4EFF9;
      border-color: #4A5A67;
    }

    .text-input {
      border: #aaaaaa 1px solid;
      background-color: #ffffff;
      padding: 4px;
      border-radius: 3px;
    }

    .splat-panel {
      margin-top: 10px;
      margin-bottom: 10px;
      padding: 10px;
      color: #111111;
      font-size: 12pt;
      font-family: "PT Sans", Arial, serif;
      border-radius: 7px;
      border: #bbbbbb 1px solid;
      background-color: #f1f1f1;
      width: 310px;
      height: 280px;
      margin-left: 8px;
      margin-right: 8px;
    }

    .loading-icon {
        width: 35px;
        padding: 15px;
        background: #324d70;
        z-index:99999;
        aspect-ratio: 1;
        border-radius: 50%;
        --_m:
            conic-gradient(#0000,#000),
            linear-gradient(#000 0 0) content-box;
        -webkit-mask: var(--_m);
            mask: var(--_m);
        -webkit-mask-composite: source-out;
            mask-composite: subtract;
        box-sizing: border-box;
        animation: ply-load 1s linear infinite;
    }

    .controls-key {
        font-weight: bold;
        padding: 3px;
        border: #aaaaaa 1px solid;
        background-color: #dddddd;
    }

    .controls-key-description {
        text-align: left;
        padding-left: 10px;
    }

    .file-ext {
        border: #bababa 1px solid;
        border-radius: 3px;
        background-color: #e6e6e6;
        padding-left: 5px;
        padding-right: 5px;
        padding-top: 3px;
        padding-bottom: 3px;
        margin-left: 3px;
        margin-right: 3px;
    }

    .file-ext-small {
        border: #ababab 1px solid;
        border-radius: 3px;
        background-color: #dfdfdf;
        padding-left: 4px;
        padding-right: 4px;
        padding-bottom: 1px;
        margin-left: 3px;
        margin-right: 3px;
    }

    @keyframes ply-load {
        to{transform: rotate(1turn)}
    }

    @media (max-width: 740px){
  
        .demo-scene-panel {
            width: 340px;
        }

        .splat-panel {
            width: 340px;
        }

        .demo-scene-panel-image {
          width: 95%;
          height: 95%;
        }

    }

    @media (max-width: 370px){

        .demo-scene-panel {
            max-width: 300px;
        }

        .splat-panel {
            max-width: 300px;
        }

        .header-content-container {
            min-width: 330px;
        }

        .demo-scene-panel-image {
          width: 95%;
          height: 95%;
        }
    }

</style>
<script type="importmap">
{
    "imports": {
        "three": "./lib/three.module.min.js",
        "gaussian-splats-3d": "./lib/gaussian-splats-3d.module.min.js"
    }
}
</script>
<script>
    let currentAlphaRemovalThreshold;
    let currentCameraUpArray;
    let currentCameraPositionArray;
    let currentCameraLookAtArray;
</script>
<script type="module">
    import * as GaussianSplats3D from 'gaussian-splats-3d';
    import * as THREE from 'three';

    function convertPLYToSplatBuffer(plyBufferData, compressionLevel, alphaRemovalThreshold, sectionSize, sceneCenter, blockSize, bucketSize) {
      const plyParser = new GaussianSplats3D.PlyParser(plyBufferData.data);
      const splatArray = plyParser.parseToUncompressedSplatArray();
      plyBufferData.data = null;
      const splatBufferGenerator = GaussianSplats3D.SplatBufferGenerator.getStandardGenerator(alphaRemovalThreshold, compressionLevel, sectionSize, sceneCenter, blockSize, bucketSize);
      return splatBufferGenerator.generateFromUncompressedSplatArray(splatArray);
    }

    function convertStandardSplatToSplatBuffer(bufferData, compressionLevel, alphaRemovalThreshold, sectionSize, sceneCenter, blockSize, bucketSize){
      const splatArray = GaussianSplats3D.SplatParser.parseStandardSplatToUncompressedSplatArray(bufferData);
      const splatBufferGenerator = GaussianSplats3D.SplatBufferGenerator.getStandardGenerator(alphaRemovalThreshold, compressionLevel, sectionSize, sceneCenter, blockSize, bucketSize);
      return splatBufferGenerator.generateFromUncompressedSplatArray(splatArray);
    }

    function isPlyFile(fileName) {
      return fileName.toLowerCase().trim().endsWith('.ply');
    }

    function fileBufferToSplatBuffer(fileBufferData, format, compressionLevel, alphaRemovalThreshold, sectionSize, sceneCenter, blockSize, bucketSize) {
      let splatBuffer;
      if (format === GaussianSplats3D.SceneFormat.Ply) {
        splatBuffer = convertPLYToSplatBuffer(fileBufferData, compressionLevel, alphaRemovalThreshold, sectionSize, sceneCenter, blockSize, bucketSize);
      } else {
        if (format === GaussianSplats3D.SceneFormat.Splat) {
          splatBuffer = convertStandardSplatToSplatBuffer(fileBufferData.data, compressionLevel, alphaRemovalThreshold, sectionSize, sceneCenter, blockSize, bucketSize);
        } else {
          GaussianSplats3D.KSplatLoader.checkVersion(fileBufferData.data);
          splatBuffer = new GaussianSplats3D.SplatBuffer(fileBufferData.data);
        }
      }
      return splatBuffer;
    }

    window.onCompressionLevelChange = function(arg) {
      const compressionLevel = parseInt(document.getElementById("compressionLevel").value);
      if (isNaN(compressionLevel) || compressionLevel < 0 || compressionLevel > 1) {
        return;
      }

      for (let i = 1; i <= 3; i++) {
        const element = document.getElementById('advancedCompressionRow' + i);
        if (compressionLevel === 0) {
          element.style.display = 'none';
        } else {
          element.style.display = '';
        }
      }
    }

    window.onFileChange = function(arg, fileNameLabelID) {
      const fileNameLabel = document.getElementById(fileNameLabelID);
      const url = arg.value;
      let lastForwardSlash = url.lastIndexOf('/');
      let lastBackwardSlash = url.lastIndexOf('\\');
      const lastSlash = Math.max(lastForwardSlash, lastBackwardSlash);
      fileNameLabel.innerHTML = url.substring(lastSlash + 1);
    }

    let conversionInProgress = false;
    window.convertPlyFile = function() {
      if (conversionInProgress) return;
      const conversionFile = document.getElementById("conversionFile");
      const compressionLevel = parseInt(document.getElementById("compressionLevel").value);
      const alphaRemovalThreshold = parseInt(document.getElementById("alphaRemovalThreshold").value);
      const sectionSize = 0;
      let sceneCenterArray = document.getElementById("sceneCenter").value;
      const blockSize = parseFloat(document.getElementById("blockSize").value);
      const bucketSize = parseInt(document.getElementById("bucketSize").value);

      sceneCenterArray = sceneCenterArray.split(',');
  
      if (sceneCenterArray.length !== 3) {
        setViewError("Scene center must contain 3 elements.");
        return;
      }

      for (let i = 0; i < 3; i++) {
        sceneCenterArray[i] = parseFloat(sceneCenterArray[i]);

        if (isNaN(sceneCenterArray[i])) {
          setViewError("Invalid scene center.");
          return;
        }
      }
  
      const sceneCenter = new THREE.Vector3().fromArray(sceneCenterArray);

      if (isNaN(compressionLevel) || compressionLevel < 0 || compressionLevel > 1) {
        setConversionError("Invalid compression level.");
        return;
      } else if (isNaN(alphaRemovalThreshold) || alphaRemovalThreshold <0 || alphaRemovalThreshold > 255) {
        setConversionError("Invalid alpha remval threshold.");
        return;
      } else if (isNaN(blockSize) || blockSize < 0.1) {
        setConversionError("Invalid block size.");
        return;
      } else if (isNaN(bucketSize) || bucketSize < 2 || bucketSize > 65536) {
        setConversionError("Invalid bucket size.");
        return;
      } else if (!conversionFile.files[0]) {
        setConversionError("Please choose a file to convert.");
        return;
      }

      setConversionError("");
      const convertButton = document.getElementById("convertButton");

      const conversionDone = (error) => {
        if (error) {
          console.error(error);
          setConversionError("Could not convert file.");
        } else {
          setConversionStatus("Conversion complete!");
          setConversionLoadingIconVisibility(false);
          setConversionCheckIconVisibility(true);
        }
        convertButton.disabled = false;
        conversionInProgress = false;
      }

      try {
        const fileReader = new FileReader();
        fileReader.onload = function(){
          convertButton.disabled = true;
          setConversionStatus("Parsing file...");
          setConversionLoadingIconVisibility(true);
          setConversionCheckIconVisibility(false);
          const conversionFileName = conversionFile.files[0].name.trim();
          const format = GaussianSplats3D.LoaderUtils.sceneFormatFromPath(conversionFileName);
          const fileData = {data: fileReader.result};
          window.setTimeout(() => {
            try {
              const splatBuffer = fileBufferToSplatBuffer(fileData, format, compressionLevel,
                                                          alphaRemovalThreshold, sectionSize, sceneCenter, blockSize, bucketSize);
              GaussianSplats3D.KSplatLoader.downloadFile(splatBuffer, 'converted_file.ksplat');
              conversionDone();
            } catch (e) {
              conversionDone(e);
            }
          }, 100);
        }
        conversionInProgress = true;
        setConversionStatus("Loading file...");
        setConversionLoadingIconVisibility(true);
        fileReader.readAsArrayBuffer(conversionFile.files[0]);
      } catch (e) {
        conversionDone(e);
      }
    }

    function setConversionError(msg) {
      setConversionLoadingIconVisibility(false);
      setConversionCheckIconVisibility(false);
      document.getElementById("conversionStatus").innerHTML = "";
      document.getElementById("conversionError").innerHTML = msg;
    }

    function setConversionStatus(msg) {
      document.getElementById("conversionError").innerHTML = "";
      document.getElementById("conversionStatus").innerHTML = msg;
    }

    function setConversionLoadingIconVisibility(visible) {
      document.getElementById('conversion-loading-icon').style.display = visible ? 'block' : 'none';
    }

    function setConversionCheckIconVisibility(visible) {
      document.getElementById('check-icon').style.display = visible ? 'block' : 'none';
    }

    window.viewSplat = function() {

      const viewFile = document.getElementById("viewFile");
      const alphaRemovalThreshold = parseInt(document.getElementById("alphaRemovalThresholdView").value);

      let cameraUpArray = document.getElementById("cameraUp").value;
      let cameraPositionArray = document.getElementById("cameraPosition").value;
      let cameraLookAtArray = document.getElementById("cameraLookAt").value;

      cameraUpArray = cameraUpArray.split(',');
      cameraPositionArray = cameraPositionArray.split(',');
      cameraLookAtArray = cameraLookAtArray.split(',');

      if (!viewFile.files[0]) {
        setViewError("Please choose a file to view.");
        return;
      } else if (isNaN(alphaRemovalThreshold) || alphaRemovalThreshold < 0 || alphaRemovalThreshold > 255) {
        setViewError("Invalid alpha remval threshold.");
        return;
      }

      if (cameraUpArray.length !== 3) {
        setViewError("Camera up must contain 3 elements.");
        return;
      }

      if (cameraPositionArray.length !== 3) {
        setViewError("Camera position must contain 3 elements.");
        return;
      }

      if (cameraLookAtArray.length !== 3) {
        setViewError("Camera look-at must contain 3 elements.");
        return;
      }

      for (let i = 0; i < 3; i++) {
        cameraUpArray[i] = parseFloat(cameraUpArray[i]);
        cameraPositionArray[i] = parseFloat(cameraPositionArray[i]);
        cameraLookAtArray[i] = parseFloat(cameraLookAtArray[i]);

        if (isNaN(cameraUpArray[i])) {
          setViewError("Invalid camera up.");
          return;
        }

        if (isNaN(cameraPositionArray[i])) {
          setViewError("Invalid camera position.");
          return;
        }

        if (isNaN(cameraLookAtArray[i])) {
          setViewError("Invalid camera look-at.");
          return;
        }
      }

      const viewFileName = viewFile.files[0].name.trim();
      const format = GaussianSplats3D.LoaderUtils.sceneFormatFromPath(viewFileName);

      currentAlphaRemovalThreshold = alphaRemovalThreshold;
      currentCameraUpArray = cameraUpArray;
      currentCameraPositionArray = cameraPositionArray;
      currentCameraLookAtArray = cameraLookAtArray;
      try {
        const fileReader = new FileReader();
        fileReader.onload = function(){
          try {
           runViewer(fileReader.result, format, alphaRemovalThreshold, cameraUpArray, cameraPositionArray, cameraLookAtArray);
          } catch (e) {
            console.error(e);
            setViewError("Could not view scene.");
          }
        }
        setViewStatus("Loading scene...");
        fileReader.readAsArrayBuffer(viewFile.files[0]);
      } catch (e) {
        console.error(e);
        setViewError("Could not view scene.");
      }
    }

    function setViewError(msg) {
      setViewLoadingIconVisibility(false);
      document.getElementById("viewStatus").innerHTML = "";
      document.getElementById("viewError").innerHTML = msg;
    }

    function setViewStatus(msg) {
      setViewLoadingIconVisibility(true);
      document.getElementById("viewError").innerHTML = "";
      document.getElementById("viewStatus").innerHTML = msg;
    }

    function setViewLoadingIconVisibility(visible) {
      document.getElementById('view-loading-icon').style.display = visible ? 'block' : 'none';
    }

    window.addEventListener("popstate", (event) => {
      if (currentAlphaRemovalThreshold !== undefined) {
        window.location = 'demo_gaussian_splats_3d.php?art=' + currentAlphaRemovalThreshold + '&cu=' + currentCameraUpArray + "&cp=" + currentCameraPositionArray + "&cla=" + currentCameraLookAtArray;
      } else {
        window.location = 'demo_gaussian_splats_3d.php';
      }
    });

    function runViewer(splatBufferData, format, alphaRemovalThreshold, cameraUpArray, cameraPositionArray, cameraLookAtArray) {
      const viewerOptions = {
        'cameraUp': cameraUpArray,
        'initialCameraPosition': cameraPositionArray,
        'initialCameraLookAt': cameraLookAtArray,
        'halfPrecisionCovariancesOnGPU': true,
      };
      const splatBufferOptions = {
        'splatAlphaRemovalThreshold': alphaRemovalThreshold
      };

      const splatBuffer = fileBufferToSplatBuffer({data: splatBufferData}, format, 0, alphaRemovalThreshold);
      document.getElementById("demo-content").style.display = 'none';
      document.body.style.backgroundColor = "#000000";
      history.pushState("ViewSplat", null);
      const viewer = new GaussianSplats3D.Viewer(viewerOptions);
      viewer.addSplatBuffers([splatBuffer], [splatBufferOptions])
      .then(() => {
          viewer.start();
      });
    }

</script>
<script>
    function openDemo(demoName) {
        window.location = 'gaussian_splats_3d_demos/' + demoName + '.html';
    }
    function reset() {
        window.location = 'demo_gaussian_splats_3d.php';
    }
</script>
<div id="demo-content" class="demo-content">
    <br>
    <div class="header-content-container">
      <div class="title">
        <div style="margin: auto">
          3D Gaussian Splatting with Three.js
        </div>
      </div>
      <div style="padding-left: 20px; padding-right: 20px;">
        This is a Three.js-based implemetation of a renderer for <a href="https://repo-sam.inria.fr/fungraph/3d-gaussian-splatting/">3D Gaussian Splatting for Real-Time Radiance Field Rendering</a>, a technique for generating 3D scenes from 2D images. Their project is CUDA-based and needs to run natively on your machine, but I wanted to build a viewer that was accessible via the web.
        <br><br>
        The 3D scenes are stored in a format similar to point clouds and can be viewed, navigated, and interacted with in real-time. This renderer will work with the original <span class="file-ext-small">.ply</span> files generated by the INRIA project. It also accepts both my own custom <span class="file-ext-small">.ksplat</span> files or the standard <span class="file-ext-small">.splat</span> files, which are both trimmed-down versions of the original <span class="file-ext-small">.ply</span>.
      </div>
      <br>
    </div>
    <br>
    <div class="header-content-container">
        <div class="title">
          <div style="margin: auto; font-size: 14pt;">
            Demo scenes
          </div>
        </div>
        <div style="text-align:center;">
          <div class="content-row" style="max-width: 800px; margin:auto; display:flex; align-items: center; justify-content: center;">
            <div class="demo-scene-panel" onclick="openDemo('garden')">
                <img src="assets/images/garden.png" class="demo-scene-panel-image">
                <span class="small-title">Garden</span>
            </div>
            <div class="demo-scene-panel" onclick="openDemo('truck')">
                <img src="assets/images/truck.png" class="demo-scene-panel-image">
                <span class="small-title">Truck</span>
            </div>
            <div class="demo-scene-panel" onclick="openDemo('stump')">
                <img src="assets/images/stump.png" class="demo-scene-panel-image">
                <span class="small-title">Stump</span>
            </div>
            <div class="demo-scene-panel" onclick="openDemo('bonsai')">
              <img src="assets/images/bonsai.png" class="demo-scene-panel-image">
              <span class="small-title">Bonsai</span>
          </div>
            <div class="demo-scene-panel" onclick="openDemo('dynamic_scenes')">
              <img src="assets/images/dynamic_scenes.png" class="demo-scene-panel-image">
              <span class="small-title">Dynamic scenes</span>
            </div>
            <div class="demo-scene-panel" onclick="openDemo('vr')">
              <img src="assets/images/bonsai.png" class="demo-scene-panel-image">
              <span class="small-title">AR/VR</span>
            </div>
          </div>
        </div>
    </div>
    <br>
    <div class="header-content-container">
        <div class="content-row">
            <div id ="view-panel" class="splat-panel" style="height:300px;">
                <br>
                <div class="small-title">View a <span class="file-ext">.ply</span>, <span class="file-ext">.ksplat</span>, or <span class="file-ext-small">.splat</span> file</div>
                <br>
                <table style="text-align: left;">
                    <tr>
                    <td colspan="2">
                        <label for="viewFile">
                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true"><span class="button">Choose file</span></span>
                        <input type="file" id="viewFile" style="display:none" onchange="window.onFileChange(this, 'viewFileName')">
                        </label>
                        <span id="viewFileName" style="padding-left:15px; color: #333333">(No file chosen)</span>
                    </td>
                    </tr>
                    <tr>
                    <td colspan="2" style="height: 10px;"></td>
                    </tr>
                    <tr>
                    <td>
                        Minimum alpha:&nbsp;
                    </td>
                    <td>
                        <input id="alphaRemovalThresholdView" type="text" class="text-input" style="width: 50px" value="1"></input>
                        <span style="color:#888888">(1 - 255)</span>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        Camera up:&nbsp;
                    </td>
                    <td>
                        <input id="cameraUp" type="text" class="text-input" style="width: 90px" value="0, 1, 0"></input>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        Camera position:&nbsp;
                    </td>
                    <td>
                        <input id="cameraPosition" type="text" class="text-input" style="width: 90px" value="0, 1, 0"></input>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        Camera look-at:&nbsp;
                    </td>
                    <td>
                        <input id="cameraLookAt" type="text" class="text-input" style="width: 90px" value="1, 0, 0"></input>
                    </td>
                    </tr>
                </table>
                <br>
                <span class="button" onclick="window.viewSplat()">View</span>
                &nbsp;&nbsp;
                <span class="button" onclick="reset()">Reset</span>
                <br>
                <br>
                <div style="display: flex; flex-direction: row; width: 230px; margin: auto;">
                    <div style="width: 50px;">
                        <div id="view-loading-icon" class="loading-icon" style="display: none;">
                        </div>
                    </div>
                    <div id="viewStatus" style="text-align: left; color: #333333; margin-top: 7px; margin-left: 15px; width: 175px"></div>
                </div>
                <span id="viewError" style="color: #ff0000"></span>
            </div>
      
            <div id ="conversion-panel" class="splat-panel" style="height:380px;">
                <br>
                <span class="small-title">Convert a <span class="file-ext">.ply</span> or <span class="file-ext">.splat</span> to <span class="file-ext">.ksplat</span></span>
                <br>
                <br>
                <table style="text-align: left;">
                    <tr>
                    <td colspan="2">
                        <label for="conversionFile">
                        <span class="glyphicon glyphicon-folder-open" aria-hidden="true"><span class="button">Choose file</span></span>
                        <input type="file" id="conversionFile" style="display:none" onchange="window.onFileChange(this, 'conversionFileName')">
                        </label>
                        <span id="conversionFileName" style="padding-left:15px; color: #333333">(No file chosen)</span>
                    </td>
                    </tr>
                    <tr>
                    <td colspan="2" style="height: 10px;"></td>
                    </tr>
                    <tr>
                      <td>
                          Minimum alpha:&nbsp;
                      </td>
                      <td>
                          <input id="alphaRemovalThreshold" type="text" class="text-input" style="width: 50px" value="1"></input>
                          <span style="color:#888888">(1 - 255)</span>
                      </td>
                    </tr>
                    <tr>
                      <td>
                          Scene center:&nbsp;
                      </td>
                      <td>
                          <input id="sceneCenter" type="text" class="text-input" style="width: 50px" value="0, 0, 0"></input>
                      </td>
                    </tr>
                    <tr>
                    <td>
                        Compression level:
                    </td>
                    <td>
                        <input id="compressionLevel" type="text" class="text-input" style="width: 50px" value="1" onChange="window.onCompressionLevelChange(this);"></input>
                        <span style="color:#888888">(0 or 1)</span>
                    </td>
                    </tr>
                    <tr id="advancedCompressionRow1">
                      <td colspan="2" style="font-weight:bold; padding-top:15px; padding-bottom: 5px;">
                        Advanced compression options
                      </td>
                    </tr>
                    <tr id="advancedCompressionRow2">
                      <td>
                        Block size:&nbsp;
                      </td>
                      <td>
                        <input id="blockSize" type="text" class="text-input" style="width: 50px" value="5.0"></input>
                        <span style="color:#888888">( >= 0.1 )</span>
                      </td>
                    </tr>
                    <tr id="advancedCompressionRow3">
                      <td>
                        Bucket size&nbsp;
                      </td>
                      <td>
                          <input id="bucketSize" type="text" class="text-input" style="width: 50px" value="256"></input>
                          <span style="color:#888888">(2 - 65536)</span>
                      </td>
                    </tr>
                </table>
                <br>
                <span id="convertButton" class="button" onclick="window.convertPlyFile()">Convert</span>
                <br>
                <br>
                <div style="text-align: center;">
                <div style="display: flex; flex-direction: row; width: 230px; margin: auto;">
                    <div style="width: 50px;">
                        <div id="conversion-loading-icon" class="loading-icon" style="display: none;">
                        </div>
                        <div id="check-icon" class="check" style="display: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="35px" width="35px" version="1.1" id="Capa_1" viewBox="0 0 17.837 17.837" xml:space="preserve" style="background:#ffffff00;">
                            <g>
                                <path style="fill:#00790a;" d="M16.145,2.571c-0.272-0.273-0.718-0.273-0.99,0L6.92,10.804l-4.241-4.27   c-0.272-0.274-0.715-0.274-0.989,0L0.204,8.019c-0.272,0.271-0.272,0.717,0,0.99l6.217,6.258c0.272,0.271,0.715,0.271,0.99,0   L17.63,5.047c0.276-0.273,0.276-0.72,0-0.994L16.145,2.571z"/>
                            </g>
                            </svg>
                        </div>
                    </div>
                    <div id="conversionStatus" style="text-align: left; color: #333333; margin-top: 7px; margin-left: 15px; width: 175px"></div>
                </div>
                </div>
                <span id="conversionError" style="color: #ff0000"></span>
            </div>

            <div id ="controls-panel" class="splat-panel" style="height:380px;">

                <br>
                <span class="small-title">Mouse input</span>
                <div style="text-align: left;">
                    <ul>
                        <li style="margin-bottom:3px;">Left click to set the focal point</li>
                        <li style="margin-bottom:3px;">Left click and drag to orbit</li>
                        <li style="margin-bottom:3px;">Right click and drag to pan</li>
                    </ul>
                </div>
                <span class="small-title">Keyboard input</span>
                <div style="height: 10px"></div>
                <table>
                    <tr>
                        <td><div class ="controls-key">I</div></td>
                        <td class="controls-key-description">Display debug info panel</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="height:1px">
                        </td>
                    </tr>
                    <tr>
                        <td><div class ="controls-key">C</div></td>
                        <td class="controls-key-description">Toggle mesh cursor</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="height:1px">
                        </td>
                    </tr>
                    <tr>
                        <td><div class ="controls-key">P</div></td>
                        <td class="controls-key-description">Toggle controls orientation marker</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="height:1px">
                        </td>
                    </tr>
                    <tr>
                        <td><div class ="controls-key" style="font-size:13pt; font-weight: bold;">&larr;</div></td>
                        <td class="controls-key-description">Rotate camera-up counter-clockwise</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="height:1px">
                        </td>
                    </tr>
                    <tr>
                        <td><div class ="controls-key" style="font-size:13pt; font-weight: bold;">&rarr;</div></td>
                        <td class="controls-key-description">Rotate camera-up clockwise</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
  </div>

<script>
   document.body.onload = function () {
    if (window.location.search) {
      const tokens = window.location.search.substring(1).split("&");
      for (token of tokens) {
        const component = token.split("=");
        const varName = component[0];
        if (varName == "art") {
          currentAlphaRemovalThreshold = component[1];
          document.getElementById('alphaRemovalThresholdView').value = currentAlphaRemovalThreshold;
        } else if (varName == "cu") {
          currentCameraUpArray = component[1];
          document.getElementById('cameraUp').value = currentCameraUpArray;
        } else if (varName == "cp") {
          currentCameraPositionArray = component[1];
          document.getElementById('cameraPosition').value = currentCameraPositionArray;
        } else if (varName == "cla") {
          currentCameraLookAtArray = component[1];
          document.getElementById('cameraLookAt').value = currentCameraLookAtArray;
        }
      }
    }
    if (history.state === "ViewSplat") {
      history.go(-1);
    }
  };
</script>


        </div>
    </div>
</body>
</html>
