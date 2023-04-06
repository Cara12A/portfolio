import create from 'zustand'
import { devtools, persist } from 'zustand/middleware'

const state = (set) => ({
    articles: [],
    recentArticles: [],
    activeCategory: null,
    pushArticle(article) {
        set((state) => ({
            articles: [article, ...state.articles],
            recentArticles: [article, ...state.recentArticles.slice(0, 9)],
        }))
    },
    popArticle() {
        set((state) => ({ articles: state.articles.slice(1) }))
    },
    clearArticles() {
        set({ articles: [] })
    },
    setActiveCategory(slug) {
        set({ activeCategory: slug })
    },
    reset() {
        set({ articles: [], activeCategory: null })
    },
    updateTitle(slug, title) {
        // We don't always know the title until after we fetch the article data
        set((state) => ({
            articles: state.articles.map((article) => {
                if (article.slug === slug) {
                    article.title = title
                }
                return article
            }),
        }))
    },
})

export const useKnowledgeBaseStore = create(
    persist(devtools(state, { name: 'Extendify Assist Knowledge Base' }), {
        name: 'extendify-assist-knowledge-base',
        getStorage: () => localStorage,
        partialize: (state) => {
            delete state.articles
            return state
        },
    }),
    state,
)
