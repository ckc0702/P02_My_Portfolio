import React from 'react'
import { useThemeContext } from '../context/theme-context'

const PrimaryColor = (props) => {
  const {themeHandler} = useThemeContext();
  return (
    <button className={props.className} onClick={() => themeHandler(props.className)}></button>
  )
}

export default PrimaryColor