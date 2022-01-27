class MouseAction {
    constructor(el) {
        this.el = el;
    }
    handleEvent(event) {
        switch(event.type) {
            case 'mouseenter':
                this.el.style.backgroundColor = "#4697B4";
                this.el.style.border = "2px solid white";
                break;
            case 'mousedown':
                this.el.style.backgroundColor = "#4697B4";
                this.el.style.border = "2px solid white";
                break;
            case 'mouseup':
                this.el.style.backgroundColor = "#002D4B";
                this.el.style.border = "2px solid white";
                break;
            case 'mouseleave':
                this.el.style.backgroundColor = "#002D4B";
                this.el.style.border = "2px solid white";
                break;
            case 'click':
                this.el.style.backgroundColor = "#4697B4";
                this.el.style.border = "2px solid white";
                break;
        }
    }
}

function infnCustomButton() {
    // document.getElementsByClassName("panel")[0].before(document.getElementsByClassName("infn-sso")[0]);
    let c = document.getElementsByClassName("infn-sso")[0];
    let mouseEvent = new MouseAction(c);
    let pnl = document.getElementsByClassName("panel")[0];

    if(c) {
        if(pnl) {
            pnl.before(c);
        }
        c.addEventListener("mouseenter", mouseEvent);
        c.addEventListener("mousedown", mouseEvent);
        c.addEventListener("mouseup", mouseEvent);
        c.addEventListener("mouseleave", mouseEvent);
        c.addEventListener("click", mouseEvent);
        //c.innerText = " INFN AAI";
        c.innerHTML = c.innerHTML.replace(/InfnAAI/," INFN AAI");
    }
}
/*function infnHidePanelFooter() {
    let lfTextId = document.getElementById("loginForm").getElementsByClassName("control-label")[0];
    let lfTextPw = document.getElementById("loginForm").getElementsByClassName("control-label")[1];
    let lfTextMb = document.getElementById("mainButton");
    let pf = document.getElementsByClassName("panel-footer");

    lfTextId.textContent = "ADMIN ID";
    lfTextPw.textContent = "ADMIN Password";
    lfTextMb.innerHTML = lfTextMb.innerHTML.replace(/Sign in/g, "ADMIN Sign in");
    pf[0].style.display = "none";
}*/

infnCustomButton();
//infnHidePanelFooter();
