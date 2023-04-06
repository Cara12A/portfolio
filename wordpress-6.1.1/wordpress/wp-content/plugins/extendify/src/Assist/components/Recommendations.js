import { Spinner } from '@wordpress/components'
import { __ } from '@wordpress/i18n'
import { useRecommendations } from '@assist/hooks/useRecommendations'

export const Recommendations = () => {
    const { recommendations, loading, error } = useRecommendations()
    const { partnerName } = window.extAssistData

    // Checks if the recommendation is available for the current partner
    const excluded = (rec) => rec?.excludedPartnersName?.includes(partnerName)
    const active = (rec) =>
        rec?.activePartnersName?.includes(partnerName) ||
        rec?.activePartnersName === null
    const recsFiltererd =
        recommendations?.filter((rec) => !excluded(rec) && active(rec)) ?? []

    if (loading || error) {
        return (
            <div className="my-4 w-full flex justify-center bg-white border border-gray-300 p-4 lg:p-8 rounded">
                <Spinner />
            </div>
        )
    }

    if (recsFiltererd.length === 0) {
        return (
            <div className="my-4 w-full mx-auto bg-white border border-gray-300 p-4 lg:p-8 rounded">
                {__(
                    "All set! We don't have any recommendations right now for your site.",
                    'extendify',
                )}
            </div>
        )
    }

    return (
        <div className="my-4 w-full mx-auto text-base">
            {recsFiltererd.map(
                ({
                    slug,
                    title,
                    description,
                    linkType,
                    externalLink,
                    internalLink,
                    buttonText,
                }) => (
                    <div
                        key={slug}
                        className="mb-4 w-full bg-white border border-gray-300 p-4 lg:p-8 flex flex-col rounded">
                        <h3 className="m-0 mb-2 text-md font-bold">{title}</h3>
                        <p className="m-0 text-sm">{description}</p>
                        <a
                            className="px-3 py-2 mt-4 w-max leading-tight min-w-30 button-focus bg-gray-100 hover:bg-gray-200 focus:shadow-button text-gray-900 rounded relative z-10 cursor-pointer text-center no-underline text-sm"
                            href={
                                linkType === 'externalLink'
                                    ? `${externalLink}`
                                    : `${window.extAssistData.adminUrl}${internalLink}`
                            }
                            target={linkType === 'externalLink' ? '_blank' : ''}
                            // eslint-disable-next-line react/jsx-no-target-blank
                            rel={
                                linkType === 'externalLink'
                                    ? 'noreferrer'
                                    : undefined
                            }>
                            <span>{buttonText}</span>
                        </a>
                    </div>
                ),
            )}
        </div>
    )
}
