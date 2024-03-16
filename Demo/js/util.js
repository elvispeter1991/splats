
var Util = Util || {};

Util.setupThumbnails = function (containerID, picsArray, basePath, tag) {

    var container = $("#" + containerID);

    for (var i = 0; i < picsArray.length; i++) {
        var path = basePath + "/thumbnails/" + picsArray[i];
        var thumbnailPath = basePath + "/" + picsArray[i];
        var imgLink = $("<a href='" + thumbnailPath + "' class='fancybox' rel='" + tag + "'></a>");
        var img = $("<img src='" + path + "'/>");
        var box =$('<div class="thumbnail-box"></div>');
        box.append(imgLink);
        imgLink.append(img);
        container.append(box);
    }

};

Util.isMobile = function () {
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
        return true;
    } else {
        return false;
    }
};