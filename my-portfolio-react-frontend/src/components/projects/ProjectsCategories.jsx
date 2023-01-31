import { useState } from 'react'
import CategoryButton from '../categoryBtn/CategoryButton'

const ProjectsCategories = (props) => {
  const [activeCategory, setActiveCategory] = useState('all');

  const changeCategoryHandler = (activeCat) => {
    setActiveCategory(activeCat);
    props.onFilterProjects(activeCat);
  }

  return (
    <div className='portfolio__categories'>
      {
        props.categories.map(category => (
          <CategoryButton key={category} category={category} onChangeCategory={() => changeCategoryHandler(category)} className={`btn cat__btn ${activeCategory === category ? 'primary' : 'white'}`}/>
        ))
      }
    </div>
  )
}

export default ProjectsCategories