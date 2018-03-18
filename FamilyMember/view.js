$(document).ready(function () {
    var familyMemberId = getUrlParameter('id');
    loadMilestones(familyMemberId);
});

function getUrlParameter(key) {
    var url = new URL(window.location);

    return url.searchParams.get(key);
}

function loadMilestones(familyMemberId) {
    $.ajax({
        type: 'POST',
        url: 'Milestones?familyMemberId=1',
        data: familyMemberId,
        success: function (results) {
            results.forEach(function (milestone) {
                addMilestone(milestone.year, milestone.era, milestone.title, milestone.description, milestone.alignment);
            });
        }
    });
}

function addMilestone(year, era, title, description, alignment) {
    var milestoneText = year + " " + era + ": " + title;
    var alignmentClass = "";
    if (alignment === "Good")
        alignmentClass = " good";
    else if (alignment === "Evil")
        alignmentClass = " evil";

    var milestoneHTML = '<div class="milestone' + alignmentClass + '"><h4>' + milestoneText + '</h4></div>';
    var milestone = $(milestoneHTML).appendTo(".timeline");
    milestone.data('description', description);
    milestone.on('click', milestone_onClick);
}

function milestone_onClick() {
    var description = $(this).data('description');
    $("#description").text(description).show();
}