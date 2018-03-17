$(document).ready(function () {
    $("#family-tree-button").on('click', familyTreeButton_onClick);
    $("#add-family-member-button").on('click', addFamilyMember_onClick);
});

function familyTreeButton_onClick() {
    window.location = "../FamilyMember/";
}

function addFamilyMember_onClick() {
    window.location = "../FamilyMember/add/";
}