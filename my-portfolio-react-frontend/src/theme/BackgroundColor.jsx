
import { useThemeContext } from './../context/theme-context';
const BackgroundColor = (props) => {
  const {themeHandler} = useThemeContext();
  return (
    <button className={props.className} onClick={() => themeHandler(props.className)}></button>
  )
}

export default BackgroundColor