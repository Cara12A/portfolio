import { Spinner } from '@wordpress/components'
import { __ } from '@wordpress/i18n'
import { chevronRightSmall, Icon } from '@wordpress/icons'
import classNames from 'classnames'
import { Breadcrumbs } from '@assist/components/support-articles/Breadcrumbs'
import { SupportArticle } from '@assist/components/support-articles/SupportArticle'
import {
    useSupportArticles,
    useSupportArticleCategories,
} from '@assist/hooks/useSupportArticles'
import { useKnowledgeBaseStore } from '@assist/state/KnowledgeBase'
import { arrowTurnRight } from '@assist/svg'

export const SupportArticlesList = () => {
    const { articles, activeCategory, setActiveCategory, pushArticle } =
        useKnowledgeBaseStore()
    const { data: categories, error: catError } = useSupportArticleCategories()
    const { data: articlesList, loading, error } = useSupportArticles()
    const userLanguage = window.extAssistData.wpLanguage

    const categoriesList = categories?.map((category) => {
        const articlesForCategory = articlesList?.filter((article) =>
            article.supportArticleCategoriesSlug?.includes(category.slug),
        )
        return { ...category, articles: articlesForCategory }
    })

    if (error || catError) {
        return (
            <div className="my-4 w-full bg-white border border-gray-300 p-4 lg:p-8 rounded">
                {__('There was an error loading articles', 'extendify')}
            </div>
        )
    }

    if (loading || !categories) {
        return (
            <div className="my-4 w-full flex justify-center bg-white border border-gray-300 p-4 lg:p-8 rounded">
                <Spinner />
            </div>
        )
    }

    if (articlesList && articlesList?.length === 0) {
        return (
            <div className="my-4 w-full bg-white border border-gray-300 p-4 lg:p-8 rounded">
                {__('No support articles found...', 'extendify')}
            </div>
        )
    }

    return (
        <div className="my-4">
            <h2 className="bg-design-main text-partner-primary-text text-xl font-normal py-4 px-8 m-0 rounded-t">
                {__('Knowledge Base', 'extendify')}
            </h2>
            {(articles?.length > 0 || activeCategory) && <Breadcrumbs />}
            {articles?.length > 0 ? (
                <SupportArticle />
            ) : (
                <div className="w-full text-base bg-white border border-gray-300 px-8 py-6 lg:p-8 rounded-b">
                    {userLanguage.startsWith('en') || (
                        <p className="mt-0 mb-8 py-3.5 px-4 text-base border border-blue-300 bg-blue-50">
                            {__(
                                'Please note: these articles are available in English only.',
                                'extendify',
                            )}
                        </p>
                    )}
                    <div className="grid md:grid-cols-2 xl:grid-cols-3 gap-x-4 gap-y-8">
                        {categoriesList
                            .filter(
                                ({ slug }) =>
                                    !activeCategory ||
                                    slug === activeCategory.slug,
                            )
                            .map((category) => (
                                <div key={category.slug}>
                                    <button
                                        aria-label={category.title}
                                        type="button"
                                        className={classNames(
                                            'mt-0 mb-4 text-base font-semibold no-underline bg-transparent p-0',
                                            {
                                                'hover:underline':
                                                    !activeCategory,
                                                'hover:text-partner-primary-bg':
                                                    !activeCategory,
                                                'cursor-pointer':
                                                    !activeCategory,
                                            },
                                        )}
                                        onClick={() =>
                                            setActiveCategory({
                                                title: category.title,
                                                slug: category.slug,
                                            })
                                        }>
                                        {category.title}
                                    </button>
                                    {category.articles
                                        .filter(
                                            (_, index) =>
                                                activeCategory || index < 5,
                                        )
                                        .map(({ slug, extendifyTitle }) => (
                                            <button
                                                aria-label={extendifyTitle}
                                                key={slug}
                                                type="button"
                                                className="flex items-center gap-2 no-underline hover:underline hover:text-partner-primary-bg bg-transparent mb-3 p-0 w-full cursor-pointer"
                                                onClick={() => {
                                                    setActiveCategory(category)
                                                    pushArticle({
                                                        slug,
                                                        title: extendifyTitle,
                                                    })
                                                }}>
                                                <Icon
                                                    icon={arrowTurnRight}
                                                    className="text-gray-600 fill-current"
                                                />
                                                <span className="leading-tight font-normal text-left text-sm -mt-px">
                                                    {extendifyTitle}
                                                </span>
                                            </button>
                                        ))}
                                    {!activeCategory &&
                                        category.articles.length > 5 && (
                                            <button
                                                aria-label={__(
                                                    'Show all',
                                                    'extendify',
                                                )}
                                                type="button"
                                                className="text-left no-underline hover:underline hover:text-partner-primary-bg bg-transparent mb-3 mt-4 p-0 w-full cursor-pointer font-semibold text-design-main flex items-center"
                                                onClick={() => {
                                                    setActiveCategory({
                                                        title: category.title,
                                                        slug: category.slug,
                                                    })
                                                }}>
                                                {__('Show all', 'extendify')}
                                                <Icon
                                                    icon={chevronRightSmall}
                                                    className="fill-current"
                                                />
                                            </button>
                                        )}
                                </div>
                            ))}
                    </div>
                </div>
            )}
        </div>
    )
}
