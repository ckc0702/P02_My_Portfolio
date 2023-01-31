import Project from './Project'
import './projects.css'

const Projects = (props) => {
  return (
    <div className="portfolio__projects" data-aos="fade-in">
        {
            props.projects.map(project => (
              <Project key={project.id} project={project}/>
            ))
        }
    </div>
  )
}

export default Projects