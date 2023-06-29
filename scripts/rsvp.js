/** Plus One Element List */
var pos = document.getElementsByClassName("po");
/**
 *  Class for Checkbox pairs, linking the display and the actual checkbox for the checkbox trick
 *
 *  It is a class, and not an interface so that we can dynamically construct pairs
 */
var CheckboxPair = /** @class */ (function () {
    function CheckboxPair(display, checkbox) {
        /**
         * @todo Add the optional null for both elements, incase they aren't able to actually grab it
         * and return false if they cannot for whatever reason
         */
        this.display = document.getElementById(display);
        this.checkbox = document.getElementById(checkbox); // Convert it to the Input element so we can check it
    }
    return CheckboxPair;
}());
/**
 *  Groups together checkbox groups
 *
 *  Need at least 2 checkboxes, any others are optional
 *
 *
 *  @param  {CheckboxPair} item1 is the first checkbox
 *  @param {CheckboxPair} item2 is the second checkbox
 *  @param {[CheckboxPair]} [otherItems] All additional checkboxes OPTIONAL
 */
var GroupCheckboxes = /** @class */ (function () {
    function GroupCheckboxes(item1, item2, otherItems) {
        this.item1 = item1;
        this.item2 = item2;
        this.otherItems = otherItems; // Force unwrap, if nothing is there it will be undefined.
    }
    /**
     * Toggles the checkbox state of an item
     * @param item The actual item to toggle
     */
    GroupCheckboxes.prototype.toggle = function (item) {
        if (this.check_state(item)) {
            item.checkbox.checked = false;
        }
        else {
            item.checkbox.checked = true;
        }
    };
    /**
     * Toggles the checkboxes in a group
     *
     * Only works if there are only 2 checkboxes in a group
     * @returns a Boolean based on if it ran or not
     */
    GroupCheckboxes.prototype.toggle_pair = function () {
        if (this.otherItems === undefined) { // Make sure there are no other items
            this.toggle(this.item1);
            this.toggle(this.item2);
            return true; // It ran, and did it's thing
        }
        else {
            return false; // It did not run
        }
    };
    /**
     * Checks the state of the checkbox passed in
     * @param item The HTMLElement passed in
     * @returns A Boolean based on if it's checked or not
     *
     */
    GroupCheckboxes.prototype.check_state = function (item) {
        return item.checkbox.checked;
    };
    /**
     * Adds an event listener to the pair, and will auto run them when toggled
     * @param function1 Function for the first checkbox item in pair
     * @param function2 Function for the second checkbox item in pair
     */
    GroupCheckboxes.prototype.add_listener_to_pair = function (function1, function2) {
        if (this.otherItems === undefined) {
            this.item1.checkbox.addEventListener("change", function () {
                this.toggle(this.item2);
                function1();
            });
            this.item2.checkbox.addEventListener("change", function () {
                this.toggle(this.item1);
                function2();
            });
        }
    };
    return GroupCheckboxes;
}());
// Test to make sure it compiles
console.log("Hello world");
// -------------------- All below this is old code ----------------------------
function display_pos() {
    for (var obj in pos) {
        try {
            pos[obj].style.display = "unset";
        }
        catch (_a) {
            break;
        }
    }
}
function check_no() {
    if (po_no.checked) {
        po_yes.checked = false;
    }
    else {
        display_pos();
    }
}
// Force 'unwrapping' because those elements WILL exist on default
var po_yes = document.getElementById("po_yes");
var po_no = document.getElementById("po_no");
po_yes.addEventListener("onclick", function () { check_no(); });
