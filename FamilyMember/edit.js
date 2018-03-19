$(document).ready(function () {
    loadHeader();
    var id = getUrlParameter('id');
    loadValues(id);
});

function loadValues(id) {
    $.ajax({
        url: 'FamilyMember?id=' + id,
        type: 'GET',
        success: function (familyMember) {
            $('#first-name-input').val(familyMember.firstName);
            $('#last-name-input').val(familyMember.lastName);
            $('#birth-year-input').val(familyMember.birthYear);
            $('#birth-era-input').val(familyMember.birthEra);
            $('#death-year-input').val(familyMember.deathYear);
            $('#death-era-input').val(familyMember.deathEra);
        }
    });
}