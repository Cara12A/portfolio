import { useTasks } from '@assist/hooks/useTasks'
import { useTasksStore, useTasksStoreReady } from '@assist/state/Tasks'

export const TaskBadge = (props) => {
    const { isCompleted } = useTasksStore()
    const { tasks } = useTasks()
    const ready = useTasksStoreReady()
    if (!ready) return null
    const { currentTheme, launchCompleted } = window.extAssistData
    if (currentTheme !== 'Extendable' || !launchCompleted) return null
    const taskCount =
        tasks?.filter(({ slug }) => !isCompleted(slug)).length ?? 0
    if (taskCount === 0) return null
    return (
        <span className="awaiting-mod" {...props}>
            {taskCount > 9 ? '9' : taskCount}
        </span>
    )
}
