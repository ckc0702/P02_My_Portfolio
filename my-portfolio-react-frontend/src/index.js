import ReactDOM from "react-dom/client";
import App from "./App";
import './index.css';
import { ModalProvider } from "./context/modal-context";
import { ThemeProvider } from "./context/theme-context";

// import "./fonts/Montserrat-Bold.ttf";
// import "./fonts/Montserrat-Light.ttf";
// import "./fonts/Montserrat-Medium.ttf";
// import "./fonts/Montserrat-Regular.ttf";
// import "./fonts/Montserrat-SemiBold.ttf";

const root = ReactDOM.createRoot(document.querySelector('#root'));
// root.render(<App></App>);
root.render(<ThemeProvider>
        <ModalProvider>
        <App/>
        </ModalProvider>
    </ThemeProvider>);