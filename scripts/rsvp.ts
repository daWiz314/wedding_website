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
     * Static so we can access it inside methods inside methods 0_o
     * @param item The actual item to toggle
     */
    static toggle(item:CheckboxPair) : void {
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
    toggle_pair() : Boolean {
        if (this.otherItems === undefined) { // Make sure there are no other items
            GroupCheckboxes.toggle(this.item1);
            GroupCheckboxes.toggle(this.item2);
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
    static check_state(item:CheckboxPair) : Boolean {
        return item.checkbox.checked;
    }

    /**
     * Adds an event listener to the pair, and will auto run them when toggled
     * @param function1 Function for the first checkbox item in pair
     * @param function2 Function for the second checkbox item in pair
     */
    add_listener_to_pair(function1: Function = ()=>void{}, function2: Function = ()=>void{}) {
        if (this.otherItems === undefined) {
            var item1 = this.item1;
            var item2 = this.item2;
            this.item1.display.addEventListener("click", function(this: GroupCheckboxes) {
                GroupCheckboxes.toggle(item1);
                if (GroupCheckboxes.check_state(item1)) { // This way the user can uncheck the 'Y' and it will do stuff
                    function1(true); // Display the items
                    if (GroupCheckboxes.check_state(item2)) { // This way we can uncheck the 'N'
                        GroupCheckboxes.toggle(item2);
                    }
                } else { // This is incase the user uncheck the 'Y', toggle the 'N'
                    function1(false);
                    GroupCheckboxes.toggle(item2);
                }
            });
            this.item2.display.addEventListener("click", function(this: GroupCheckboxes) {
                GroupCheckboxes.toggle(item2); // Toggle button
                if (GroupCheckboxes.check_state(item2)) { // Allow to uncheck 'N' and do stuff
                    if (GroupCheckboxes.check_state(item1)) { // Make sure we do the opposite of what we are doing
                        GroupCheckboxes.toggle(item1);
                    }
                    function2(false); // Undisplay the items
                } else { // If we uncheck the 'N', toggle the 'Y'
                    GroupCheckboxes.toggle(item1);
                    function2(true);
                }
            })
        }
    }
}

/**
 * Display Plus One element input fields
 * @param display A bool that will either display the items or not
 */
let display_po = function (display: Boolean) {
    for(let obj in pos) { // The pos array will contain a few other elements, and if we try to do anything with them, it will just error out, allowing us to affect just the actual elements
        try {
            if (display) {
                (pos[obj] as HTMLElement).style.display = "unset";
            } else {
                (pos[obj] as HTMLElement).style.display = "none";
            }
        } catch {
            break;
        }
    }
}

// Test to make sure it compiles
function test_check_boxes() {
    let attending = new GroupCheckboxes(new CheckboxPair("at_yes", "at_yes_cb"), new CheckboxPair("at_no", "at_no_cb"));
    let plus_one = new GroupCheckboxes(new CheckboxPair("po_yes", "po_yes_cb"), new CheckboxPair("po_no", "po_no_cb"));
    attending.add_listener_to_pair(()=>void{}, display_po);
    plus_one.add_listener_to_pair(display_po, display_po);
}




// -------------------- All below this is old code ----------------------------
// function display_pos() {
//     for (let obj in pos) {
//         try {
//            (pos[obj] as HTMLElement).style.display = "unset";
//         }
//         catch {
//             break;
//         }
//     }
// }

// function check_no() {
//     if ((po_no as HTMLInputElement).checked) {
//         (po_yes as HTMLInputElement).checked = false;
//     } else {
//         display_pos();
//     }
// }
// Force 'unwrapping' because those elements WILL exist on default
// var po_yes:HTMLElement = document.getElementById("po_yes")!;
// var po_no:HTMLElement = document.getElementById("po_no")!;
// po_yes.addEventListener("onclick", function() {check_no()});