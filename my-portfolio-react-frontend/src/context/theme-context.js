import { createContext, useContext, useEffect, useReducer} from "react";
import themeReducer from "./themeReducer";

export const ThemeContext = createContext();

const initialThemeState = JSON.parse(localStorage.getItem('themeSettings')) || {primary: 'color-1', background: 'bg-1'}

export const ThemeProvider = ({children}) => {
    const [themeState, dispatchTheme] = useReducer(themeReducer, initialThemeState);

    const themeHandler = (buttonClassName) => {
        dispatchTheme({type: buttonClassName})
    }

    // console.log(themeState);

    // Save theme to local storage
    useEffect(() => {
        localStorage.setItem('themeSettings', JSON.stringify(themeState));
        //useEffect rerun whenever dependency change
    }, [themeState.primary, themeState.background]) // eslint-disable-line react-hooks/exhaustive-deps

    return <ThemeContext.Provider value={{themeState, themeHandler}}>{children}</ThemeContext.Provider>
}

// custom hook 
export const useThemeContext = () => {
    return useContext(ThemeContext);
}