$(document).ready(function () {
    $("#add-milestone-button").on("click", addMilestone_onClick);

    addMilestone(41, "BBY", "Born", "Anakin was born into slavery on the planet Tatooine.", "Neutral");
    addMilestone(32, "BBY", "Became a Padawan", "Qui-Gon Jinn asked his apprentice Obi-Wan Kenobi to train Anakin with his dying wish.", "Good");
    addMilestone(22, "BBY", "Married Padme", "Anakin married Senator Padme Amidala in secret, as romance are forbidden among the Jedi.", "Neutral");
    addMilestone(19, "BBY", "Turned to Dark Side", "Darth Sidious convinced Anakin that the Dark Side of the Force could help him save his wife, leading him to kill in the Siths' name.", "Evil");
    addMilestone(0, "BBY", "Killed Obi-Wan Kenobi", "As Darth Vader, Anakin slayed his old master on the Death Star.", "Evil");
    addMilestone(4, "ABY", "Died", "Anakin died saving his son, Luke, from the Emperor's wrath, but suffered mortal wounds in the process.", "Good");
});

function addMilestone_onClick() {
    var yearString = getValueAndClear("year-input");
    var era = getValueAndClear("era-input");
    var title = getValueAndClear("title-input");
    var description = getValueAndClear("description-input");
    var alignment = getValueAndClear("alignment-input");

    var year = parseInt(yearString);
    if (!year) {
        $("#add-milestone-year-error-message").show();
        $("#year-input").css('background-color', '#ffcccc');
        return false;
    }
    else {
        $("#add-milestone-year-error-message").hide();
        $("#year-input").css('background-color', 'white');
    }

    addMilestone(year, era, title, description, alignment);
}

function getValueAndClear(id) {
    var node = $("#" + id);
    var value = node.val();
    node.val("");
    return value;
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
    console.log(milestone.data('description'));
    milestone.on('click', milestone_onClick);
}

function milestone_onClick() {
    var description = $(this).data('description');
    $("#description").text(description).show();
}