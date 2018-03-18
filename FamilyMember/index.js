$(document).ready(function () {
   loadHeader();

   loadFamilyMembers();
});

function loadFamilyMembers() {
    $.ajax({
        url: 'FamilyMember/',
        type: 'GET',
        success: function (familyMembers) {
            familyMembers.forEach(function (familyMember) {
                addFamilyMember(familyMember);
            })
        }
    })
}

function addFamilyMember(familyMember) {
    var familyMemberHtml = '<li><div class="family-tree-node ' + familyMember.alignment + '"><h4>'
        + familyMember.firstName + ' ' + familyMember.lastName + '</h4></div></li>';

    $(familyMemberHtml).appendTo('#family-tree-root');
}