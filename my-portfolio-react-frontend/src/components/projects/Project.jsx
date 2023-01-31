import Card from '../card/Card'

const Project = (props) => {
  return (
    <Card className='portfolio__project'>
        <div className="portfolio_project-image">
            <img src={props.project.image} alt="portfolio project" />
        </div>
        <h4>{props.project.title}</h4>
        <p>{props.project.desc}</p>
        <div className="portfolio__project-cta">
            <a href={props.project.demo} className='btn sm' target='_blank' rel='noopener noreferrer'>
                Demo
            </a>
            <a href={props.project.github} className='btn sm primary' target='_blank' rel='noopener noreferrer'>
                Github
            </a>
        </div>
    </Card>
  )
}

export default Project