/** Plus One Element List */
let pos:HTMLCollectionOf<Element> = document.getElementsByClassName("po"); 


/**
 *  Class for Checkbox pairs, linking the display and the actual checkbox for the checkbox trick
 *  
 *  It is a class, and not an interface so that we can dynamically construct pairs
 */

class CheckboxPair {
    display: HTMLElement;
    checkbox: HTMLInputElement;
    constructor(display: string, checkbox: string) {
        /**
         * @todo Add the optional null for both elements, incase they aren't able to actually grab it
         * and return false if they cannot for whatever reason
         */
        this.display = document.getElementById(display)!;
        this.checkbox = document.getElementById(checkbox)! as HTMLInputElement; // Convert it to the Input element so we can check it
    }
}

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
class GroupCheckboxes {
    private item1: CheckboxPair;
    private item2: CheckboxPair;
    private otherItems: CheckboxPair[] | undefined; // This way we can use the undefined for checking in toggle_pairs()

    constructor(item1:CheckboxPair, item2:CheckboxPair, otherItems?: CheckboxPair[]) {
        this.item1 = item1;
        this.item2 = item2;
        this.otherItems = otherItems! // Force unwrap, if nothing is there it will be undefined.
    }

    /**
     * Toggles the checkbox state of an item
     * @param item The actual item to toggle
     */
    toggle(item:CheckboxPair) {
        if (this.check_state(item)) {
            item.checkbox.checked = false;
        } else {
            item.checkbox.checked = true;
        }
    }

    /**
     * Toggles the checkboxes in a group
     * 
     * Only works if there are only 2 checkboxes in a group
     * @returns a Boolean based on if it ran or not
     */
    toggle_pair() : boolean {
        if (this.otherItems === undefined) { // Make sure there are no other items
            this.toggle(this.item1);
            this.toggle(this.item2);
            return true; // It ran, and did it's thing
        } else {
            return false; // It did not run
        }
    }

    /**
     * Checks the state of the checkbox passed in
     * @param item The HTMLElement passed in
     * @returns A Boolean based on if it's checked or not
     * 
     */
    check_state(item:CheckboxPair) : boolean {
        return item.checkbox.checked;
    }

    /**
     * Adds an event listener to the pair, and will auto run them when toggled
     * @param function1 Function for the first checkbox item in pair
     * @param function2 Function for the second checkbox item in pair
     */
    add_listener_to_pair(function1: Function, function2: Function) {
        if (this.otherItems === undefined) {
            this.item1.checkbox.addEventListener("change", function(this: GroupCheckboxes) {
                this.toggle(this.item2);
                function1();
            });
            this.item2.checkbox.addEventListener("change", function(this: GroupCheckboxes) {
                this.toggle(this.item1);
                function2();
            })
        }
    }
}




// -------------------- All below this is old code ----------------------------
function display_pos() {
    for (let obj in pos) {
        try {
           (pos[obj] as HTMLElement).style.display = "unset";
        }
        catch {
            break;
        }
    }
}

function check_no() {
    if ((po_no as HTMLInputElement).checked) {
        (po_yes as HTMLInputElement).checked = false;
    } else {
        display_pos();
    }
}

// Force 'unwrapping' because those elements WILL exist on default
var po_yes:HTMLElement = document.getElementById("po_yes")!;
var po_no:HTMLElement = document.getElementById("po_no")!;
po_yes.addEventListener("onclick", function() {check_no()});