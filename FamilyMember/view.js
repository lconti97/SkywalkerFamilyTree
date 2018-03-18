$(document).ready(function () {


    var familyMemberId = getUrlParameter('id');
    loadMilestones(familyMemberId);
});

function getUrlParameter(key) {
    var url = new URL(window.location);

    return url.searchParams.get(key);
}

function loadMilestones(familyMemberId) {
    var xmlHttpRequest = new XMLHttpRequest();
    var url = '../../Milestones?familyMemberId=' + familyMemberId;
    xmlHttpRequest.open('GET', url);
    xmlHttpRequest.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            var milestones = JSON.parse(this.responseText);
            milestones.forEach(function (milestone) {
                addMilestone(milestone.year, milestone.era, milestone.title, milestone.description, milestone.alignment);
            });
        }
    };

    xmlHttpRequest.send();
}

// function addMilestone_onClick() {
//     var yearString = getValueAndClear("year-input");
//     var era = getValueAndClear("era-input");
//     var title = getValueAndClear("title-input");
//     var description = getValueAndClear("description-input");
//     var alignment = getValueAndClear("alignment-input");

//     var year = parseInt(yearString);
//     if (!year) {
//         $("#add-milestone-year-error-message").show();
//         $("#year-input").css('background-color', '#ffcccc');
//         return false;
//     }
//     else {
//         $("#add-milestone-year-error-message").hide();
//         $("#year-input").css('background-color', 'white');
//     }

//     addMilestone(year, era, title, description, alignment);
// }

// function getValueAndClear(id) {
//     var node = $("#" + id);
//     var value = node.val();
//     node.val("");
//     return value;
// }

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
}

// function milestone_onClick() {
//     var description = $(this).data('description');
//     $("#description").text(description).show();
// }