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
    var familyMemberHtml = '<li><div class="family-tree-node ' + familyMember.alignment + '"><a href="FamilyMember/view?id=1" class="nav">'
        + familyMember.firstName + ' ' + familyMember.lastName + '</a></div></li>';

    $(familyMemberHtml).appendTo('#family-tree-root');
}