$(document).ready(function () {
   $(".family-tree-node").on('click', familyTreeNode_onClick);
});

function familyTreeNode_onClick() {
    window.location = "timeline.html";
}