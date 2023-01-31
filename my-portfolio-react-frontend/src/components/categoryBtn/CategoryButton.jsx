const CategoryButton = (props) => {

  return (
    <button className={props.className} onClick={() => props.onChangeCategory(props.category)}>{props.category}</button>
  )
}

export default CategoryButton